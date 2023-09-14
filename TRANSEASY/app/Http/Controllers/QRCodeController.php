<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
// use Symfony\Component\HttpFoundation\Response;
use Dompdf\Dompdf;
use PDF ;


class QRCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create( Request $request)
{

    $qrCode = QrCode::size(250)->generate($request->token);
    $base64QrCode = base64_encode($qrCode);


    $data = [
        'from' => $request->from,
        'to' => $request->to,
        'passengerName' => $request->name,
        'seatNumber' => $request->place_number,
        'date' => $request->date,
        'qrcode' => $base64QrCode
    ];
    $objData = (object) $data ;
    $dompdf = new Dompdf();

    $dompdf->setPaper('A4', 'portrait');
    $html = view('pdf.tickettemplate', compact('objData'))->render();
    $dompdf->loadHtml($html);

    $dompdf->render();
    $pdfContent = $dompdf->output();

    $pdfPath = storage_path('app\public\tickets\token.pdf');
    file_put_contents($pdfPath, $pdfContent);

    return view('ineractWithUser.downloadTicket', compact('objData', 'pdfPath'));
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

        public function scanQRCode(Request $request)
        {
            $data = $request->all();

            // Here you can process the scanned QR code and extract its value
            $qrCodeValue = $data['qrCodeValue'];


            // Return the value of the scanned QR code
            return response()->json([
                'qrCodeValue' => $qrCodeValue
            ]);
        }

        public function showScanQRCodeView()
{
    return view('scan-qr-code');
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
