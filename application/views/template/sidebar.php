<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><div class="panel-group" id="accordion">
                           
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-th">
                            </span> Transaksi</a>
                        </h4>
                    </div>
                    
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-saved"></span><a href="<?php echo site_url('Dashboard');?>"> Trans</a></span>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                   
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-file">
                            </span> Laporan</a>
                        </h4>
                    </div>
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-saved"></span><a href="<?php echo site_url('Transaksi/Riwayat');?>"> History Transaksi</a></span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="<?php echo site_url('CUser');?>"><span class="glyphicon glyphicon-off">
                            </span> Logout</a>
                        </h4>
                    </div>
                </div>
</div>