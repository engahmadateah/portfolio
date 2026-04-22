<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Filament\Resources\SettingResource\RelationManagers;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;


class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('site_name'),

                TextInput::make('hero_title'),
                
                TextInput::make('hero_subtitle'),
                
                Textarea::make('about_text')
                    ->rows(5)
                    ->columnSpanFull(),
                
                TextInput::make('email')
                    ->email(),
                
                TextInput::make('phone'),
                
                TextInput::make('github'),
                
                TextInput::make('linkedin'),
                
             
                
                FileUpload::make('profile_image')
                    ->image()
                    ->directory('settings/profile'),
                    
                    FileUpload::make('favicon')
                    ->label('Favicon')
                    ->image()
                    ->directory('settings')
                    ->imageEditor()
                    ->helperText('يفضل صورة مربعة 64x64 أو 128x128'),

                    FileUpload::make('cv_file')
                      ->label('السيرة الذاتية PDF')
                    ->directory('cv')
                     ->acceptedFileTypes(['application/pdf'])
                     ->downloadable()
                    ->openable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('site_name'),
            Tables\Columns\TextColumn::make('email'),
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
