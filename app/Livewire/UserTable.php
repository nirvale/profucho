<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

final class UserTable extends PowerGridComponent
{
    use AuthorizesRequests;
    public string $tableName = 'userTable';
    public bool $showErrorBag = true;
    // private $idEdit;
    // public $email;
    // public $name;
    // public $phone;
    // public $address;


    public function setUp(): array
    {
        // $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::responsive()
                ->fixedColumns('name', 'actions'),
            PowerGrid::footer()
                ->showPerPage(perPage: 50, perPageValues: [0, 50, 100, 500])
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
      $this->authorize('Administrar operación');
      return User::query()
          ->LeftJoin('profiles', 'users.id', '=', 'profiles.user_id')
          ->select([
              'users.id',
              'users.name',
              'users.email',
              'profiles.is_active',
              'profiles.address',
              'profiles.phone',
              'profiles.address as user_address',
              'profiles.phone as user_phone',

          ]);
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('email')
            ->add('created_at')
            ->add('phone')
            ->add('address')
            ->add('image', function ($model) {
                  return '<img class="w-8 h-8 shrink-0 grow-0 rounded-full" src="' . route('avatar.displayImage', $model->id.'-50x50.jpg' ) . '">';
            });
    }

    public function columns(): array
    {
        return [
            // Column::make('Id', 'id'),
            Column::make('Avatar', 'image'),
            Column::make(
                title: __('Is Active'),
                field: 'is_active',

            )
                ->toggleable(
                    hasPermission: auth()->user()?->can('Administrar operación'),
                    trueLabel: 'Yes',
                    falseLabel: 'No'
                )
                ->sortable(),
            Column::add()
                ->title(__('Name'))
                ->field('name')
                ->sortable()
                ->searchable()
                ->editOnClick(
                    hasPermission: auth()->user()?->can('Administrar operación'),
                ),
            Column::make(__('Email'), 'email')
                ->sortable()
                ->searchable()
                ->editOnClick(
                    hasPermission: auth()->user()?->can('Administrar operación'),
                ),
            Column::make(
                title: __('Address'),
                field: 'address',
                dataField: 'user_address'
            )
                ->sortable()
                // ->searchable()
                ->editOnClick(
                    hasPermission: auth()->user()?->can('Administrar operación'),
                ),
            Column::make(
                title: __('Phone'),
                field: 'user_phone',
                dataField: 'user_phone'
            )
                ->sortable()
                // ->searchable()
                ->editOnClick(
                    hasPermission: auth()->user()?->can('Administrar operación'),
                ),
                Column::make(
                    title: __('P2'),
                    field: 'phone',
                    dataField: 'profiles.phone'
                )
                    // ->sortable()
                    ->searchable()
                    ->hidden(),
                Column::make(
                    title: __('A2'),
                    field: 'address',
                    dataField: 'profiles.address'
                )
                    // ->sortable()
                    ->searchable()
                    ->hidden(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('prompt('.$rowId.')');
    }

    public function actions(User $row): array
    {
        return [
            // Button::add('edit')
            //     ->slot('Edit: '.$row->id)
            //     ->id()
            //     ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
            //     ->dispatch('edit', ['rowId' => $row->id]),

            Button::add('pwd')
                // ->slot('Edit: '.$row->id)
                ->slot('<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M10.5 7q0-.825.588-1.412T12.5 5t1.413.588T14.5 7t-.587 1.413T12.5 9t-1.412-.587T10.5 7m2 17L8 19.5l1.5-2l-1.5-2l1.5-2.125V12.2q-1.35-.8-2.175-2.162T6.5 7q0-2.5 1.75-4.25T12.5 1t4.25 1.75T18.5 7q0 1.675-.825 3.038T15.5 12.2V21zm-4-17q0 1.4.85 2.463t2.15 1.412V14l-1.025 1.45L12 17.5l-1.375 1.775L12.5 21.15l1-1v-9.275q1.3-.35 2.15-1.412T16.5 7q0-1.65-1.175-2.825T12.5 3T9.675 4.175T8.5 7"/></svg>')
                ->id()
                ->class('link link-success')
                ->attributes([])
                ->dispatch('changePwd', ['id' => $row->id,'name'=>$row->name]),
            Button::add('delete')
                // ->slot('Edit: '.$row->id)
                ->slot('<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M17 9h4q.425 0 .713.288T22 10t-.288.713T21 11h-4q-.425 0-.712-.288T16 10t.288-.712T17 9m-8 3q-1.65 0-2.825-1.175T5 8t1.175-2.825T9 4t2.825 1.175T13 8t-1.175 2.825T9 12m-8 6v-.8q0-.85.438-1.562T2.6 14.55q1.55-.775 3.15-1.162T9 13t3.25.388t3.15 1.162q.725.375 1.163 1.088T17 17.2v.8q0 .825-.587 1.413T15 20H3q-.825 0-1.412-.587T1 18m2 0h12v-.8q0-.275-.137-.5t-.363-.35q-1.35-.675-2.725-1.012T9 15t-2.775.338T3.5 16.35q-.225.125-.363.35T3 17.2zm6-8q.825 0 1.413-.587T11 8t-.587-1.412T9 6t-1.412.588T7 8t.588 1.413T9 10m0 8"/></svg>')
                ->id()
                ->class('link link-error')
                ->attributes([])
                ->dispatch('delete',['rowId' => $row->id, 'rowName' => $row->name]),


        ];
    }

    #[\Livewire\Attributes\On('changePwd')]
    public function changePwd($id,$name){
      $this->dispatch('showModalChangePwd',[
        'modalId'=>'modal-change-pwd',
        'status'=>'modal-open',
        'title'=>__('Change password'),
        'content'=>['id'=>$id,'name'=>$name],
        'icon'=>'<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M10.5 7q0-.825.588-1.412T12.5 5t1.413.588T14.5 7t-.587 1.413T12.5 9t-1.412-.587T10.5 7m2 17L8 19.5l1.5-2l-1.5-2l1.5-2.125V12.2q-1.35-.8-2.175-2.162T6.5 7q0-2.5 1.75-4.25T12.5 1t4.25 1.75T18.5 7q0 1.675-.825 3.038T15.5 12.2V21zm-4-17q0 1.4.85 2.463t2.15 1.412V14l-1.025 1.45L12 17.5l-1.375 1.775L12.5 21.15l1-1v-9.275q1.3-.35 2.15-1.412T16.5 7q0-1.65-1.175-2.825T12.5 3T9.675 4.175T8.5 7"/></svg>',
      ]);
    }

    #[\Livewire\Attributes\On('delete-user')]
    public function destroy($data){
      $this->authorize('Administrar operación');
      $user=User::FindOrFail($data['id']);
      $existsA = Storage::exists('images/profiles/'. $user->id.'-200x200.jpg');
      $existsB = Storage::exists('images/profiles/'. $user->id.'-50x50.jpg');
      try {
        DB::BeginTransaction();
        $user->delete();
        if ($existsA) {
          Storage::Delete('images/profiles/'. $user->id.'-200x200.jpg');
        }
        if ($existsB) {
          Storage::Delete('images/profiles/'. $user->id.'-50x50.jpg');
        }
        DB::Commit();
        $this->dispatch('pg:eventRefresh-userTable');
        $this->dispatch('notifyalpine', '¡Usuario Eliminado!', 'Se eliminó del sistema correctamente al usuario:<br>'.$user->name, 'success', 0);

      } catch (\Exception $e) {

        DB::Rollback();
        $this->dispatch('notifyalpine', '¡Error!', 'Falló la eliminación del usuario, contacte al adminstrador', 'error', 0);
      }


    }

    #[\Livewire\Attributes\On('delete')]
    public function delete($rowId, $rowName): void
    {
        // dd($rowId,$rowName);
        // $this->js('alert('.$rowId.')');
        $this->skipRender();
        $this->dispatch('notifyalpine', '¡Eliminar Usuario!', '¿Está seguro de eliminar al usuario?<br>'.$rowName, 'warning', 0, null, null, 'Eliminar', 'Cancelar', ['id' => $rowId, 'eventAccept' => 'delete-user']);
    }
    public function onUpdatedEditable(string|int $id, string $field, string $value): void
    {
        $this->idEdit = $id;

        // Reglas de validación
        $rules = [
            'email' => 'required|email|max:255|min:10|unique:users,email,' . $id,
            'name' => 'required|string|max:255|min:10',
            'user_address' => 'nullable|string|max:255|min:10',
            'user_phone' => 'nullable|digits:10',
        ];

        // Validar
        if (isset($rules[$field])) {
            $validator = validator([$field => $value], [$field => $rules[$field]]);
            if ($validator->fails()) {
                $this->dispatch('toggle-' . $field . '-' . $id);
                $this->dispatch('notifyalpine', 'Error', $validator->errors()->first(), 'error', 3000);
                return;
            }
        }

        // Actualizar
        try {
            DB::beginTransaction();

            match($field) {
                'name', 'email' => User::find($id)->update([$field => e($value)]),
                'user_address' => User::find($id)->profile->update(['address' => e($value)]),
                'user_phone' => User::find($id)->profile->update(['phone' => e($value)]),
                default => null
            };

            DB::commit();
            $this->dispatch('notifyalpine', '¡Terminado!', 'Actualizado correctamente', 'success', 3000);

        } catch (\Exception $e) {
            DB::rollBack();
            $this->dispatch('notifyalpine', '¡Error!', 'Falló la actualización', 'error', 3000);
        }

        $this->resetValidation();
    }


    // protected function rules(){
    //   $rules = [
    //       'name.*' => ['required', 'string', 'max:255', 'min:10'],
    //       'address.*' => ['nullable', 'string', 'max:255', 'min:10'],
    //       'phone.*' => ['nullable', 'digits:10', 'integer'],
    //       // 'email.*' => [
    //       //     'required',
    //       //     'string',
    //       //     'email',
    //       //     'max:255',
    //       //     'min:10',
    //       //     Rule::unique('users')->ignore($this->idEdit) // Importante para edición
    //       // ],
    //
    //
    //   ];
    //   return $rules;
    // }


    public function onUpdatedToggleable(string|int $id, string $field, string $value): void
    {
        // Log::info('actualizando toggeable: '.$id."\n");
        $this->authorize('Administrar operación');
        try {
            DB::beginTransaction();
            $user = User::findOrFail($id);
            $user->profile->{$field }= e($value);
            $user->push();
            if ($field == 'is_active' && ! $value) {
                $user->assignRole('Suspendido');
            } elseif ($field == 'is_active' && $value) {
                $user->removeRole('Suspendido');
            }
            DB::Commit();
            $this->skipRender();
        } catch (\Exception $e) {
            DB::beginRollback();
            // Log::info('actualizando toggeable: '.$id."\n");
        }
        //
        // User::query()->find($id)->update([
        //     $field => e($value),
        // ]);
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
