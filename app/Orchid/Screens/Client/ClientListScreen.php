<?php

namespace App\Orchid\Screens\Client;

use App\Http\Requests\ClientRequest;
use App\Models\Client;

use App\Orchid\Layouts\Client\ClientListTable;
use App\Orchid\Layouts\CreateOrUpdateClient;

use Orchid\Screen\Actions\ModalToggle;

use Orchid\Screen\Screen;

use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;


class ClientListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'clients' => Client::filters()->defaultSort('status')->paginate(5),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Клиенты';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Добавить клиента')
                ->modal('CreateClient')
                ->method('createOrUpdateClient'),

//            ModalToggle::make('Редактировать клиента')
//                ->modal('editClient'),


        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [

            ClientListTable::class,
            Layout::modal('CreateClient', CreateOrUpdateClient::class)->title('Добавить клиента')->applyButton('Добавить'),
            Layout::modal('editClient', CreateOrUpdateClient::class )->async('asyncGetClient'),
        ];
    }

    public function asyncGetClient(Client $client): array
    {
        return
            [
                'client' => $client
            ];
    }



    public function createOrUpdateClient(ClientRequest $request)
    {
        $clientId = $request->input('client.id');

        Client::updateOrCreate([
            'id' => $clientId
        ], array_merge($request->validated()['client'],
            ['status' => 'interviewed']
        ));

        is_null($clientId) ? Toast::info('Клиент создан') : Toast::info('Клиент обновлен');

    }


}
