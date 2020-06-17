
    <div class="border-right" id="sidebar-wrapper">
      <div class="sidebar-heading border-bottom"><img src="<? echo base_url(); ?>assets/admin/img/poliwangi.png">
      <h6><?php echo $this->session->userdata('level_user'); ?></h6>
      </div>
      <div class="list-group list-group-flush" id="myTab">
        

              <a class="list-group-item list-group-item-action" href="<? echo base_url(); ?>admin/User">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="fa fa-list pull-left"></span> User
              </a>


              
            
      </div>

      <div class="line">&nbsp;</div>

      <div class="btn-logout">
      <div class="line">&nbsp;</div>

        <div class="logout pb-0">
          <a href="<? echo base_url(); ?>Logout-User" class="list-group-item list-group-item-action"> <span class="fa fa-list pull-left"></span> logout</a>
        </div>
      </div>
    </div>