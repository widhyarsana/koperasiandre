<div class="sidebar-content">
     <div class="card card-sidebar-mobile">
          <div class="card-body p-0">
               <ul class="nav nav-sidebar" data-nav-type="accordion">
                    <li class="nav-item">
                         <a href="{{ route('dashboard') }}" class="nav-link">
                              <i class="icon-home4"></i>
                              <span>
                                   Dashboard
                              </span>
                         </a>
                    </li>
                    @role('manager')
                         <li class="nav-item">
                              <a href="{{ route('manager.staff.index') }}" class="nav-link">
                                   <i class="icon-users"></i>
                                   <span>
                                        Staff
                                   </span>
                              </a>
                         </li>
                         <li class="nav-item">
                              <a href="{{ route('manager.criteria.index') }}" class="nav-link">
                                   <i class="icon-printer4"></i>
                                   <span>
                                        Kriteria
                                   </span>
                              </a>
                         </li>
                         <li class="nav-item">
                              <a href="{{ route('manager.subcriteria.index') }}" class="nav-link">
                                   <i class="icon-office"></i>
                                   <span>
                                        Sub Kriteria
                                   </span>
                              </a>
                         </li>
                         <li class="nav-item nav-item-submenu">
                              <a href="#" class="nav-link"><i class="icon-book"></i> <span>Laporan</span></a>
                         
                              <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                                   <li class="nav-item"><a href="#" class="nav-link">Laporan Peminjam</a>
                                   </li>
                                   <li class="nav-item"><a href="#" class="nav-link">Laporan Kelayakan</a>
                                   </li>
                              </ul>
                         </li>
                    @endrole

                    @role('staff')
                    <li class="nav-item">
                         <a href="{{ route('staff.customer.index') }}" class="nav-link">
                              <i class="icon-users"></i>
                              <span>
                                   Peminjam
                              </span>
                         </a>
                    </li>
                    <li class="nav-item">
                         <a href="{{ route('staff.criteria.index') }}" class="nav-link">
                              <i class="icon-printer4"></i>
                              <span>
                                   Kriteria
                              </span>
                         </a>
                    </li>
                    <li class="nav-item">
                         <a href="{{ route('staff.valuation.create') }}" class="nav-link">
                              <i class="icon-office"></i>
                              <span>
                                   Input Kelayakan
                              </span>
                         </a>
                    </li>
                    <li class="nav-item">
                         <a href="{{ route('staff.valuation.index') }}" class="nav-link">
                              <i class="icon-history"></i>
                              <span>
                                   Histori Kelayakan
                              </span>
                         </a>
                    </li>
                    <li class="nav-item nav-item-submenu">
                         <a href="#" class="nav-link"><i class="icon-book"></i> <span>Laporan</span></a>

                         <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                              <li class="nav-item"><a href="#" class="nav-link">Laporan Peminjam</a>
                              </li>
                              <li class="nav-item"><a href="{{ route('report.valuation.index') }}" class="nav-link">Laporan Kelayakan</a>
                              </li>
                         </ul>
                    </li>
                    @endrole
               </ul>
          </div>
     </div>
</div>