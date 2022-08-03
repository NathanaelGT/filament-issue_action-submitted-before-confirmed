<?php

namespace App\Filament\Resources\TodoResource\Pages;

use App\Filament\Resources\TodoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTodo extends EditRecord
{
    protected static string $resource = TodoResource::class;

    protected function getActions(): array
    {
        return [

            Actions\DeleteAction::make(),
        ];
    }

    protected function getFormActions(): array
    {
        if ($this->record->is_completed) {
            return [];
        }

        return [
            Actions\Action::make('complete')
                ->button()
                ->color('success')
                ->submit('save')
                ->requiresConfirmation()
                ->successNotificationMessage('Todo marked as complete')
                ->action(function (): void {
                    $this->record->update([
                        'is_completed' => true,
                    ]);

                    $this->redirect(TodoResource::getUrl('view', ['record' => $this->record]));
                }),

            $this->getSaveFormAction(),
            $this->getCancelFormAction(),
        ];
    }

    public function mount($record): void
    {
        parent::mount($record);

        if ($this->record->is_completed) {
            $this->redirect(TodoResource::getUrl('view', ['record' => $this->record]));
        }
    }
}
