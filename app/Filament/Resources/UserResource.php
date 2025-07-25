<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getPluralLabel(): ?string
    {
        return 'کاربران';
    }

    public static function getLabel(): ?string
    {
        return 'کاربران';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Grid::make(2)->schema([
                Forms\Components\TextInput::make('first_name')
                    ->label('نام')
                    ->required()
                    ->maxLength(50)
                    ->autofocus(),

                Forms\Components\TextInput::make('last_name')
                    ->label('نام خانوادگی')
                    ->required()
                    ->maxLength(50),
            ]),

            Forms\Components\TextInput::make('email')
                ->label('ایمیل')
                ->email()
                ->required()
                ->unique(ignoreRecord: true),

            Forms\Components\TextInput::make('password')
                ->label('رمز عبور')
                ->password()
                ->required(fn (string $context) => $context === 'create')
                ->minLength(6)
                ->same('password_confirmation')
                ->dehydrateStateUsing(fn ($state) => !empty($state) ? bcrypt($state) : null)
                ->dehydrated(fn ($state) => filled($state)),

            Forms\Components\TextInput::make('password_confirmation')
                ->label('تکرار رمز عبور')
                ->password()
                ->required(fn (string $context) => $context === 'create'),

            Select::make('role_id')
                ->label('نقش کاربر')
                ->options(fn () => Role::pluck('name', 'id')->toArray())
                ->searchable()
                ->required()
        ]);
    }

     public static function table(Table $table): Table
    {
        $user = Auth::user();

        if (! $user->hasRole('admin')) {
            return $table
                ->columns([])
                ->filters([])
                ->actions([])
                ->bulkActions([])
                ->emptyStateHeading('شما دسترسی به این بخش ندارید')
                ->paginated(false);
        }

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                    ->label('نام')
                    ->getStateUsing(fn ($record) => $record->first_name . ' ' . $record->last_name)
                    ->searchable(['first_name', 'last_name']),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }


    // Non-Admin Users Can't create new users
    public static function canCreate(): bool
    {
        return Auth::user()?->hasRole('admin');

    }

      public static function canEdit($record): bool
    {
        $user = Auth::user();

        return $user->hasRole('admin') || $user->id === $record->id;
    }
    
        public static function canDelete($record): bool
    {
        return Auth::user()?->hasRole('admin');
    }

       public static function canDeleteAny(): bool
    {
        return Auth::user()?->hasRole('admin');
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
