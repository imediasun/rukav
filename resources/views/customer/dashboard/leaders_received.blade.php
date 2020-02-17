
<div id="panel-2" class="panel" data-panel-fullscreen="false">
    <div class="panel-hdr">
        <h2>
            Leadersboard received
        </h2>
    </div>
    <div class="frame-wrap">
        <table class="table m-0">
            <thead>
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Gives</th>
                <th>Received</th>
            </tr>
            </thead>
            <tbody>

          @foreach($leadersBoardReceived as $board)
              <tr>
                  <th scope="row">{{$board->id}}</th>
                  <td>
                  <span class="status status-danger">
                  <span class="profile-image rounded-circle d-inline-block" style="background-image:url('/storage/avatars/{{$board->getCustomersCompany->photo}}')"></span>
                  </span>


                  </td>
                  <td>{{$board->sentCount}}</td>
                  <td>{{$board->receivedCount}}</td>
              </tr>
              @endforeach
            </tbody>
        </table>
    </div>


</div>
