<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ElevatorController extends Controller
{
    public function getOptimalRoute()
    {
        // Define the floors where passengers are located
        $passengers = [
            'A' => ['start' => 5, 'destination' => 15],
            'B' => ['start' => 12, 'destination' => 8],
            'C' => ['start' => 6, 'destination' => 20],
            'D' => ['start' => 3, 'destination' => 17],
        ];

        // Sort passengers based on their pickup floors (ascending order)
        uasort($passengers, function ($a, $b) {
            return $a['start'] <=> $b['start'];
        });

        // Initialize variables
        $currentFloor = 1;
        $totalTravelTime = 0;
        $stops = [];

        // Start picking up passengers and drop them off in order
        foreach ($passengers as $person => $details) {
            $pickupFloor = $details['start'];
            $destinationFloor = $details['destination'];

            // Move to the pickup floor
            $travelToPickup = abs($currentFloor - $pickupFloor);
            $totalTravelTime += $travelToPickup;
            $stops[] = "Pick up Person $person at floor $pickupFloor";

            // Update current floor to the pickup floor
            $currentFloor = $pickupFloor;

            // Move to the destination floor
            $travelToDestination = abs($currentFloor - $destinationFloor);
            $totalTravelTime += $travelToDestination;
            $stops[] = "Drop off Person $person at floor $destinationFloor";

            $currentFloor = $destinationFloor;
        }

        // Return the results to a Blade view
        return view('index', compact('stops', 'totalTravelTime'));
    }
}
