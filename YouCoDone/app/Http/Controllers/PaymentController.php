<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Log;
use App\Models\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationPaidMail;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Restaurant $restaurant, Reservation $reservation)
    {
        return view('client.payment', compact('restaurant', 'reservation'));
    }



    public function success(Request $request)
    {
        $reservation = Reservation::findOrFail($request->reservation);

        $reservation->update([
            'payment_status' => true,
        ]);

        $restaurant = $reservation->restaurant;

        Notification::create([
            'type' => 'payment',
            'message' => 'New reservation payment confirmed.',
            'reservation_id' => $reservation->id,
            'user_id' => $restaurant->user_id,
        ]);

        Mail::to($reservation->user->email)
            ->send(new ReservationPaidMail($reservation, $restaurant));

        return view('client.confirmation', compact('reservation', 'restaurant'));
    }


    public function downloadInvoice(Reservation $reservation)
    {
        $pdf = new \FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);

        $pdf->Cell(40, 10, 'Reservation Invoice');
        $pdf->Ln();

        $pdf->SetFont('Arial', '', 16);
        $pdf->Cell(10, 10, 'Mr: ' . $reservation->user->name);
        $pdf->Ln();
        $pdf->Cell(10, 10, 'Restaurant: ' . $reservation->restaurant->name);
        $pdf->Ln();
        $pdf->Cell(10, 10, 'city: ' . $reservation->restaurant->city);
        $pdf->Ln();
        $pdf->Cell(10, 10, 'location: ' . $reservation->restaurant->address);
        $pdf->Ln();
        $pdf->Cell(10, 10, 'Date: ' . $reservation->reservation_date);
        $pdf->Ln();
        $pdf->Cell(10, 10, 'Time: ' . $reservation->time_solt);
        $pdf->Ln();
        $pdf->Cell(10, 10, 'People: ' . $reservation->number_of_people);

        return response($pdf->Output())
            ->header('Content-Type', 'application/pdf');
    }




    public function cancel()
    {
        return redirect()->back()->with('error', 'Payment was cancelled.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}