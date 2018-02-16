@extends('layouts.dashboard')

 

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">Editar Usuario</div>

    <div class="panel-body">
      <user-edit-form :user-id="{{ $user->id }}">
        <form-alert :show="alert.show" :state="alert.type">
          @{{ alert.message }}
        </form-alert>

        <form class="form-horizontal" action="#" role="form" @submit.prevent="onSubmit" method="POST" @keydown="form.errors.clear($event.target.name)">
          <div class="form-group" v-bind:class="{ 'has-error' : form.errors.has('email') }">
            <label class="col-md-4 control-label">Email</label>

            <div class="col-md-6">
              <input type="text" class="form-control" v-model="form.email" required>

              <span class="help-block" v-if="form.errors.has('email')">
                <strong>@{{ form.errors.get('email') }}</strong>
              </span>
            </div>
          </div>

          <div class="form-group" v-bind:class="{ 'has-error' : form.errors.has('name') }">
            <label class="col-md-4 control-label">Nombre</label>

            <div class="col-md-6">
              <input type="text" class="form-control" v-model="form.name" required>

              <span class="help-block" v-if="form.errors.has('name')">
                <strong>@{{ form.errors.get('name') }}</strong>
              </span>
            </div>
          </div>

          <div class="form-group" v-bind:class="{ 'has-error' : form.errors.has('password') }">
            <label class="col-md-4 control-label">Clave</label>

            <div class="col-md-6">
              <input type="password" class="form-control" v-model="form.password">

              <span class="help-block">
                Dejar en blanco si no deseas cambiar la clave.
              </span>

              <span class="help-block" v-if="form.errors.has('password')">
                <strong>@{{ form.errors.get('password') }}</strong>
              </span>
            </div>
          </div>

          <div class="form-group" v-bind:class="{ 'has-error' : form.errors.has('password_confirmation') }">
            <label class="col-md-4 control-label">Confirmar Clave</label>

            <div class="col-md-6">
              <input type="password" class="form-control" v-model="form.password_confirmation">

              <span class="help-block" v-if="form.errors.has('password_confirmation')">
                <strong>@{{ form.errors.get('password_confirmation') }}</strong>
              </span>
            </div>
          </div>

          <div class="form-group m-t-lg">
            <div class="col-md-6 col-md-offset-4">
              <a href="{{ URL::previous() }}" class="btn btn-default">Cancelar</a>
              <button type="submit" class="btn btn-primary" :disabled="form.errors.any()">
                <i class="fa fa-btn fa-save"></i> Aceptar
              </button>
            </div>
          </div>
        </form>
      </user-edit-form>
    </div>
  </div>
@endsection
