@extends('author::admin.master.master')
@section('content')
<section id="main-content">
    <section class="wrapper site-min-height">
      <!-- page start-->
      <div class="chat-room mt">
        <aside class="mid-side">
          <div class="chat-room-head">
            <h3>Lobby Room</h3>
            <form action="#" class="pull-right position">
              <input type="text" placeholder="Search" class="form-control search-btn ">
            </form>
          </div>
          <div class="room-desk">
            <h4 class="pull-left">Open Room</h4>
            <a href="#" class="pull-right btn btn-theme02">+ Create Room</a>
            <div class="room-box">
              <h5 class="text-primary"><a href="chat_room.html">Dashboard</a></h5>
              <p>We talk here about our dashboard. No support given.</p>
              <p><span class="text-muted">Admin :</span> Sam Soffes | <span class="text-muted">Members :</span> 98 | <span class="text-muted">Last Activity :</span> 2 min ago</p>
            </div>
            <div class="room-box">
              <h5 class="text-primary"><a href="chat_room.html">Support</a></h5>
              <p>Support chat for Dashio. Purchase ticket needed.</p>
              <p><span class="text-muted">Admin :</span> Sam Soffes | <span class="text-muted">Member :</span> 44 | <span class="text-muted">Last Activity :</span> 15 min ago</p>
            </div>
            <div class="room-box">
              <h5 class="text-primary"><a href="chat_room.html">MaxFront</a></h5>
              <p>Technical support for our front-end. No customization.</p>
              <p><span class="text-muted">Admin :</span> Sam Soffes | <span class="text-muted">Member :</span> 22 | <span class="text-muted">Last Activity :</span> 15 min ago</p>
            </div>
          </div>
          <div class="room-desk">
            <h4 class="pull-left">private room</h4>
            <div class="room-box">
              <h5 class="text-primary"><a href="chat_room.html">Dash Stats</a></h5>
              <p>Private chat regarding our site statics.</p>
              <p><span class="text-muted">Admin :</span> Sam Soffes | <span class="text-muted">Member :</span> 13 | <span class="text-muted">Last Activity :</span> 15 min ago</p>
            </div>
            <div class="room-box">
              <h5 class="text-primary"><a href="chat_room.html">Gold Clients</a></h5>
              <p>Exclusive support for our Gold Members. Membership $98/year</p>
              <p><span class="text-muted">Admin :</span> Sam Soffes | <span class="text-muted">Member :</span> 13 | <span class="text-muted">Last Activity :</span> 15 min ago</p>
            </div>
          </div>
        </aside>
        <aside class="right-side">
          <div class="user-head">
            <a href="#" class="chat-tools btn-theme"><i class="fa fa-cog"></i> </a>
            <a href="#" class="chat-tools btn-theme03"><i class="fa fa-key"></i> </a>
          </div>
          <div class="invite-row">
            <h4 class="pull-left">Team Members</h4>
            <a href="#" class="btn btn-theme04 pull-right">+ Invite</a>
          </div>
          <ul class="chat-available-user">
            <li>
              <a href="chat_room.html">
                <img class="img-circle" src="img/friends/fr-02.jpg" width="32">
                Paul Brown
                <span class="text-muted">1h:02m</span>
                </a>
            </li>
            <li>
              <a href="chat_room.html">
                <img class="img-circle" src="img/friends/fr-05.jpg" width="32">
                David Duncan
                <span class="text-muted">1h:08m</span>
                </a>
            </li>
            <li>
              <a href="chat_room.html">
                <img class="img-circle" src="img/friends/fr-07.jpg" width="32">
                Laura Smith
                <span class="text-muted">1h:10m</span>
                </a>
            </li>
            <li>
              <a href="chat_room.html">
                <img class="img-circle" src="img/friends/fr-08.jpg" width="32">
                Julia Schultz
                <span class="text-muted">3h:00m</span>
                </a>
            </li>
            <li>
              <a href="chat_room.html">
                <img class="img-circle" src="img/friends/fr-01.jpg" width="32">
                Frank Arias
                <span class="text-muted">4h:22m</span>
                </a>
            </li>
          </ul>
        </aside>
      </div>
      <!-- page end-->
    </section>
    <!-- /wrapper -->
  </section>
@stop

