@extends('layouts.app')
<!-- name folder.filename -->
@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
  <!-- Display Validation Errors -->
  @include('common.errors')
  <!-- New Task Form -->
  <form action="/task" method="POST" class="form-horizontal">
    {{ csrf_field() }}
    <!-- csrf secure -->
    <!-- Task Name -->
    <div class="form-group">
      <label for="task" class="col-sm-3 control-label">Task</label>

      <div class="col-sm-6">
        <input type="text" name="name" id="task-name" class="form-control">
      </div>
    </div>

    <!-- Add Task Button -->
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-6">
        <button type="submit" class="btn btn-default">
          <i class="fa fa-plus"></i> Add Task
        </button>
      </div>
    </div>
  </form>

  <!-- Current Tasks -->
  @if (count($tasks) > 0)
  <div class="panel panel-default">
    <div class="panel-heading">
      Current Tasks
    </div>

    <div class="panel-body">
      <table class="table table-striped task-table">

        <!-- Table Headings -->
        <thead>
          <th>Task</th>
          <th>Done</th>
          <th>Action</th>
        </thead>

        <!-- Table Body -->
        <tbody>
          @foreach ($tasks as $task)
          <!-- Task Name -->
          <td class="table-text">
            <div>{{ $task->name }}</div>
          </td>
          <!-- checkbox -->
          <form action="/task/{{ $task->id }}"></form>
          <td>
            <div class="form-check">
              <input class="form-check-input ml-0 done" type="checkbox" value="" id="flexCheckDefault">
            </div>
          </td>
          <!-- Delete Button -->
          <td>
            <form action="/task/{{ $task->id }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}

              <button>Delete Task</button>
            </form>
          </td>
          </tr>
          </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @endif
</div>

<!-- TODO: Current Tasks -->
@endsection