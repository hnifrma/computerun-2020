<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Exception;

class NewAttendanceController extends Controller
{
    // Utility function to check whether the registration has been opened
    private function isEventExists($eventId){
        try {
            // Check the database whether the event is opened
            $event = DB::table('events')->where('id', $eventId)->get();
            if (!isset($event) || count($event) == 0 || $event[0]->attendance_opened == 0) return false;
            return $event[0]->name;
        } catch (Exception $e){
            return false;
        }
    }

    private function validateEvent($eventId, $eventtoken){
        try {
            // Check the database whether the event is opened
            $event = DB::table('events')->where('id', $eventId)->get();
            if (!isset($event) || count($event) == 0 || $event[0]->attendance_opened == 0) return false;
            if ($event[0]->totp_key != $eventtoken) return false;
            return $event[0]->name;
        } catch (Exception $e){
            return false;
        }
    }

    private function handleAttendance($eventId, $user){
        date_default_timezone_set('Asia/Jakarta');
        $eventSearch = DB::table('events')->where('id', $eventId)->get()[0];

        try {
            $isExit = true;
            if ($eventSearch->attendance_is_exit == 0) $isExit = false;

            // Search on ticket
            $registrationSearch = DB::table('registration')->where('ticket_id', $user->id)->where('event_id', $eventId)->get();
            if (count($registrationSearch) == 0) throw new Exception();

            $i = 0;
            while ($i < count($registrationSearch) && $registrationSearch[$i]->status < 2) $i++;
            if ($i == count($registrationSearch)) throw new Exception();

            // Add to Attendance
            $attendancePayload = [
                'registration_id' => $registrationSearch[$i]->id,
                'type' => "EVENT_#" . $eventId . "_" . (($isExit) ? "EXIT" : "ENTRANCE"),
                'timestamp' => now()
            ];
            $attendanceId = DB::table("attendance")->insertGetId($attendancePayload);

            // Update the registration table
            if (
                (!$isExit && $registrationSearch[$i]->status == 2) ||
                ($isExit && $registrationSearch[$i]->status == 4)
            ) DB::table("registration")->where('id', $registrationSearch[$i]->id)->update(['status' => (!$isExit) ? 4 : 5]);

            $viewPayload = [
                'attendance_id' => $attendanceId,
                'registration_id' => $registrationSearch[$i]->id,
                'event_id' => $eventId,
                'account_id' => $user->id,
                'account_name' => $user->name,
                'attendance_type' => $attendancePayload['type'],
                'attendance_timestamp' => date_format($attendancePayload['timestamp'],"Y-m-d H:i:s"),
                'event_name' => $eventSearch->name,
                'url_link' => $eventSearch->url_link
            ];
    
            return ($isExit) ? view("static.webinar-end", $viewPayload) : view("static.webinar-start", $viewPayload);
        } catch (Exception $e){
            Session::put('error', 'Attendance: No valid tickets found for this event.');
            return redirect('home');
        }
    }

    // Login Page
    public function index($eventId){
        $validated = $this->isEventExists($eventId);
        if (!$validated){
            Session::put('error', 'Attendance: This event is not open for attendance or does not exist.');
        }

        // Directly check the ticket if the user has logged in
        //if (Session::has('nim') && Session::has('ticket_number')) return $this->handleAttendance($eventId, Session::get('nim'), Session::get('ticket_number'));

        return redirect('login');
    }

    // Handle submissions
    public function store(Request $request, $eventId){
        if (!Auth::check()) return response()->json(['error' => 'You are not authenticated']);

        $eventtoken = $request->input('event-token');
        $validated = $this->validateEvent($eventId, $eventtoken);
        if (!$validated){
            Session::put('error', 'Attendance: Incorrect Attendance Token. Please try again.');
            return redirect('home');
        }

        return $this->handleAttendance($eventId, Auth::user());
    }

}
