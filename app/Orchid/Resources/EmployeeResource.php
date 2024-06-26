<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Crud\Filters\DefaultSorted;
use App\Orchid\Filters\EmployeeFilter;
use Orchid\Screen\Layouts\Persona;
use App\Models\Employee;


class EmployeeResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Employee::class;


    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Input::make('name')
            ->horizontal()
                ->title('Nombres del Empleado')
                ->max(255)
                ->required()
                ->placeholder('Nombres del empleado'),
            Input::make('email')
            ->horizontal()
                ->type('email')
                ->required()
                ->title(__('Email'))
                ->placeholder(__('Email')),
            Input::make('dni')
            ->horizontal()
                ->title('DNI')
                ->max(255)
                ->required()
                ->placeholder('Documento Nacional de Identidad'),
            Input::make('functional')
            ->horizontal()
                ->title('Cargo Funcional')
                ->max(255)
                ->placeholder('Cargo Nominal'),
            Input::make('nominal')
            ->horizontal()
                ->title('Cargo Nominal')
                ->max(255)
                ->placeholder('Cargo Nominal'),
            Select::make('type')
            ->horizontal()
                ->options([
                    'Permanente'   => 'Permanente',
                    'Contrato' => 'Contrato',
                    'Interinato' => 'Interinato',
                ])
                ->required()
                ->title('Tipo de Contratación')
                ->help('Seleccione el tipo de contratación'),
        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('name','Nombre Completo')
            ->sort()
            ->filter(Input::make())
            ->render(fn (Employee $user) => new Persona($user->presenter())),

            TD::make('email','Correo Electrónico'),
            TD::make('dni','DNI'),
            TD::make('funcional','Cargo Funcional')
            ->defaultHidden(),
            TD::make('nominal','Cargo Nominal')
            ->defaultHidden(),

            TD::make('type','Tipo de Contratación'),

            TD::make('created_at', 'Fecha de Creación')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                })->defaultHidden(),

            TD::make('updated_at', 'Actualizado el')
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                })->defaultHidden(),
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [
            EmployeeFilter::class,
        ];
    }
}
