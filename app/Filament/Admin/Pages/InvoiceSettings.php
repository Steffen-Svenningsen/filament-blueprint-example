<?php

namespace App\Filament\Admin\Pages;

use App\Models\InvoiceSetting;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Contracts\Support\Htmlable;
use UnitEnum;

class InvoiceSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected string $view = 'filament.admin.pages.invoice-settings';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static ?string $navigationLabel = 'Fakturaindstillinger';

    protected static ?int $navigationSort = 2;

    public function getTitle(): string|Htmlable
    {
        return __('Invoice Settings');
    }

    public static function getNavigationLabel(): string
    {
        return __('Invoice Settings');
    }

    public static function getNavigationGroup(): string|UnitEnum|null
    {
        return __('Invoice');
    }

    public function getSubheading(): ?string
    {
        return __('These settings will automatically be used when generating invoices.');
    }

    protected function getFormModel(): ?InvoiceSetting
    {
        return InvoiceSetting::first();
    }

    public ?array $data = [];

    public function mount(): void
    {
        $setting = InvoiceSetting::first();

        $this->data = $setting?->toArray() ?? [];
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                Section::make(__('Company Information'))
                    ->schema([
                        TextInput::make('company_name')
                            ->label(__('Company Name'))
                            ->required()
                            ->validationMessages([
                                'required' => __('Company Name is required'),
                            ]),

                        TextInput::make('address')
                            ->label(__('Address'))
                            ->required()
                            ->validationMessages([
                                'required' => __('Address is required'),
                            ]),
                        TextInput::make('zip')
                            ->label(__('Zip Code'))
                            ->numeric()
                            ->length(4)
                            ->required()
                            ->validationMessages([
                                'required' => __('Zip Code is required'),
                                'length' => __('Zip Code must be 4 digits'),
                                'numeric' => __('Zip Code must be numeric'),
                            ]),
                        TextInput::make('city')
                            ->label(__('Town'))
                            ->required()
                            ->validationMessages([
                                'required' => __('Town is required'),
                            ]),
                        TextInput::make('cvr_number')
                            ->label(__('CVR Number'))
                            ->required()
                            ->validationMessages([
                                'required' => __('CVR Number is required'),
                            ]),

                        FileUpload::make('logo_path')
                            ->label(__('Company Logo'))
                            ->disk('public')
                            ->image()
                            ->directory('logos')
                            ->maxSize(1024)
                            ->nullable()
                            ->multiple(false),
                    ]),

                Section::make(__('Contact Information'))
                    ->schema([
                        TextInput::make('email')
                            ->label(__('Email'))
                            ->email()
                            ->required()
                            ->validationMessages([
                                'required' => __('Email is required'),
                                'email' => __('Email must be a valid email address'),
                            ]),
                        TextInput::make('phone')
                            ->label(__('Phone'))
                            ->required()
                            ->validationMessages([
                                'required' => __('Phone is required'),
                            ]),
                    ]),

                Section::make(__('Bank Information'))
                    ->schema([
                        TextInput::make('bank_name')
                            ->label(__('Bank Name'))
                            ->required()
                            ->validationMessages([
                                'required' => __('Bank Name is required'),
                            ]),
                        TextInput::make('reg_number')
                            ->label(__('Reg. Number'))
                            ->required()
                            ->validationMessages([
                                'required' => __('Reg. Number is required'),
                            ]),
                        TextInput::make('account_number')
                            ->label(__('Account Number'))
                            ->required()
                            ->validationMessages([
                                'required' => __('Account Number is required'),
                            ]),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $settings = InvoiceSetting::first();

        if (! $settings) {
            $settings = InvoiceSetting::create($data);
        } else {
            $settings->update($data);
        }

        Notification::make()
            ->success()
            ->title(__('Invoice settings saved successfully.'))
            ->send();
    }

    protected function getActions(): array
    {
        return [];
    }
}
