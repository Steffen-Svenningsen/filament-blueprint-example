<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Invoice') }} {{ $invoice->invoice_number }}</title>
    <link rel="stylesheet" href="/resources/css/filament/admin/invoice/style.css">
</head>
<body>

        <!-- Header -->
        <table class="header-table">
            <tr>
                <td class="header-left">
                    <h1>{{ __('Invoice') }}</h1>
                    <p class="company-name">SK Transport</p>
                </td>
                <td class="header-right">
                    <div class="logo">Logo</div>
                </td>
            </tr>
        </table>

        <!-- Info Section -->
        <table class="info-table">
            <tr>
                <td class="info-left">
                    <p><strong>{{ __('Sender') }}:</strong></p>
                    <p>SK Transport</p>
                    <p><strong>CVR:</strong> 27761518</p>
                    <p><strong>{{ __('Email address') }}:</strong> sktransp@hotmail.com</p>
                    <p><strong>{{ __('Phone') }}:</strong> 24614037</p>
                    <p><strong>{{ __('Address') }}:</strong> Håndværkervej 6, Sejerslev, 7900 Nykøbing Mors</p>
                </td>
                <td class="info-right">
                    <p><strong>{{ __('Recipient') }}:</strong></p>
                    <p>{{ $invoice->customer->name }}</p>
                    @if ($invoice->customer->address)
                        <p>{{ $invoice->customer->address }}</p>
                    @endif
                    @if ($invoice->customer->city)
                        <p>{{ $invoice->customer->city }}</p>
                    @endif
                    <p><strong>{{ __('Invoice number') }}:</strong> {{ $invoice->invoice_number }}</p>
                    <p><strong>{{ __('Date') }}:</strong> {{ $invoice->issue_date->format('d/m/Y') }}</p>
                    <p><strong>{{ __('Payment Due Date') }}:</strong> {{ $invoice->payment_due_date->format('d/m/Y') }}</p>
                </td>
            </tr>
        </table>

        <!-- Title if exists -->
        @if($invoice->invoice_title)
            <h2 class="invoice-title">{{ $invoice->invoice_title }}</h2>
        @endif

        <!-- Services Table -->
        <table class="services-table">
            <thead>
                <tr>
                    <th class="desc-col">{{ __('Description') }}</th>
                    <th class="qty-col">{{ __('Quantity') }}</th>
                    <th class="price-col">{{ __('Unit Price') }}</th>
                    <th class="total-col">{{ __('Total') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoice->product_lines ?? [] as $line)
                    <tr>
                        <td>
                            @if(!empty($line['custom_service']))
                                {{ $line['custom_service'] }}
                            @elseif(!empty($line['service_id']))
                                {{ \App\Models\Service::find($line['service_id'])->name ?? '' }}
                            @endif
                        </td>
                        <td class="text-right">{{ $line['quantity'] ?? 0 }}</td>
                        <td class="text-right">{{ number_format($line['unit_price'] ?? 0, 2, ',', '.') }} kr</td>
                        <td class="text-right">{{ number_format($line['total'] ?? 0, 2, ',', '.') }} kr</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Totals -->
        <table class="totals-table">
            <tr>
                <td class="totals-label"></td>
                <td class="totals-content">
                    <table class="totals-inner">
                        <tr>
                            <td>{{ __('Amount excl. VAT') }}:</td>
                            <td class="text-right">{{ number_format($invoice->subtotal ?? 0, 2, ',', '.') }} kr</td>
                        </tr>
                        <tr>
                            <td>{{ __('VAT 25%') }}:</td>
                            <td class="text-right">{{ number_format($invoice->tax ?? ($invoice->subtotal * 0.25), 2, ',', '.') }} kr</td>
                        </tr>
                        <tr class="total-row">
                            <td><strong>{{ __('Total Amount') }}:</strong></td>
                            <td class="text-right"><strong>{{ number_format($invoice->total ?? ($invoice->subtotal * 1.25), 2, ',', '.') }} kr</strong></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- Footer -->
        <div class="footer-section">
            <table class="footer-table">
                <tr>
                    <td class="footer-left">
                        <p><strong>{{ __('Bank Information for Payment') }}:</strong></p>
                        <p>Bank: Frøslev-Mollerup Sparekasse</p>
                        <p>Reg.nr. 9133 – {{ __('Account Number') }}. 2050342</p>
                        <p>{{ __('Account Holder') }}: SK Transport ApS</p>
                    </td>
                    <td class="footer-right">
                        <p>{{ __('Payment due within 14 days net') }}.</p>
                        <p>{{ __('Thereafter, 2% interest is charged per month') }}.</p>
                    </td>
                </tr>
            </table>
        </div>

</body>
