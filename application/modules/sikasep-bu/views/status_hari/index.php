    <div class="container">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="alert notification" style="display: none;">
                    <button class="close" data-close="alert"></button>
                    <p></p>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered">
                            <div class="portlet-body">
                                <div class="table-toolbar">
                                    <div class="row">
                                        <!-- <div class="col-md-6">
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-primary add_calendar"> Tambah Status Hari
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                                <br>
                                                <br>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <!-- place -->
                                <div id="calendarIO"></div>
                                <div class="modal fade" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form class="form-horizontal" method="POST" action="POST" id="form_create">
                                                <input type="hidden" name="id" value="0">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                                  <h4 class="modal-title" id="myModalLabel">Create calendar event</h4>
                                              </div>
                                              <div class="modal-body">

                                                <div class="form-group">
                                                   <div class="alert alert-danger" style="display: none;"></div>
                                               </div>
                                               <div class="form-group">
                                                <label class="control-label col-sm-2">Judul </label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="title" class="form-control" placeholder="Judul" required="">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-2">Deskripsi</label>
                                                <div class="col-sm-10">
                                                    <textarea name="description" rows="3" class="form-control"  placeholder="Masukkan Deskripsi" required=""></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                <label class="col-md-4 control-label" for="color">Tandai</label>
                                <div class="col-md-4">
                                    <input id="color" name="color" type="text" class="form-control input-md" readonly="readonly" />
                                    <span class="help-block">Ganti Warna</span>
                                </div>
                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-2">Dari Tanggal</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                        <input type="date" name="start_date" class="form-control" readonly required="">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-2">Sampai Tanggal</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                        <input type="date" name="end_date" class="form-control" readonly required="">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <a href="javascript::void" class="btn default" data-dismiss="modal">Cancel</a>
                                            <a class="btn btn-danger delete_calendar" style="display: none;">Delete</a>
                                            <button type="submit" class="btn green">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end place -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>