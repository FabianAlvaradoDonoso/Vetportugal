<div class="modal fade" id="calendarModal" tabindex="-1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
      </div>
      <div class="modal-body">
        <form id="form" method="post">
          
          {{ csrf_field() }} {{-- TOKEN! --}}

          {{ method_field('PUT') }}

          <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" name="id" id="id" class="form-control" hidden>
            <small class="text-muted">ID de la cita médica</small>
          </div>

          <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control">
            <small class="text-muted">Nombre de quien solicita la hora</small>
          </div>

          <div class="form-group">
            <label for="phone">Telefono:</label>
            <input type="text" name="phone" id="phone" class="form-control">
            <small class="text-muted">Telefono de quien solicita la hora</small>
          </div>

          <div class="form-group row">
            <div class="col-md-10">
              <label for="state_id">Estado de la cita:</label>
              <select class="form-control" name="state_id" id="state_id">
              @foreach ($states as $state)
                  <option value="{{$state->id}}">{{ucfirst($state->state)}}</option>
              @endforeach  
              </select>
              <small class="text-muted">Estado de la cita</small>
            </div>
            <div class="col-md-2 my-auto">
                <i style="font-size: 20px; margin-top: 10px;" id="state" class="fas fa-circle"></i>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Editar Información</button>
        </div>
      </form>
    </div>
  </div>
</div>
