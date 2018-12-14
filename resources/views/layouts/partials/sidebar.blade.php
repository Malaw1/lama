<aside class="sidebar">
    <div class="scroll-sidebar">
        @if(session()->get('theme-layout') != 'fix-header')
            <div class="user-profile">
                <div class="dropdown user-pro-body ">
                    <div class="profile-image">
                        <img src="{{asset('plugins/images/users/11.jpg')}}" alt="user-img" class="img-circle">
                        <a href="javascript:void(0);" class="dropdown-toggle u-dropdown text-blue"
                           data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="badge badge-danger">
                            <i class="fa fa-angle-down"></i>
                        </span>
                        </a>
                        <ul class="dropdown-menu animated flipInY">
                            <li><a href="javascript:void(0);"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-inbox"></i> Inbox</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-cog"></i> Account Settings</a></li>
                            <li role="separator" class="divider"></li>
                        <li><a href="{{ Auth::logout() }}"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                <p class="profile-text m-t-15 font-16"><a href="javascript:void(0);"> Djibril NDIAYE</a></p>
                </div>
            </div>
        @endif
        <nav class="sidebar-nav">
            <ul id="side-menu">
                <li>
                    <a class="active waves-effect" href="{{asset('dashboard')}}" aria-expanded="false"><i class="icon-screen-desktop fa-fw"></i> Dashboard</a>
                </li>
                <li class="two-column">
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i
                                class="icon-equalizer fa-fw"></i> <span class="hide-menu"> Logistiques</span></a>
                    <ul aria-expanded="false" class="collapse">
                            {{-- <li><a href="{{asset('logistiques')}}">Logistiques</a></li> --}}
                        <li><a href="{{asset('faisabilites')}}">Etude de Faisabilite</a></li>
                        <li><a href="{{asset('reactifs')}}">Reactifs</a></li>
                        <li><a href="{{asset('substances')}}">Substances de References et Matieres Premieres</a></li>
                        <li><a href="{{asset('objetEssai')}}">Objets d'essais</a></li>
                        {{-- <li><a href="{{asset('echantillons')}}">Echantillons</a></li> --}}
                        <li><a href="{{asset('materiels')}}">Consommable et Verreries</a></li>
                    </ul>
                </li>
                <li class="two-column">
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i
                                class="icon-docs fa-fw"></i> <span class="hide-menu"> Analyses</span></a>
                    <ul aria-expanded="false" class="collapse">
                        {{-- <li><a href="{{asset('starter-page')}}">Starter Page</a></li> --}}
                        <li><a href="{{asset('analyses')}}">Analyses en cours</a></li>
                        <li><a href="{{asset('search-result')}}">Archives</a></li>
                        <li><a href="{{asset('tests')}}">Tests</a></li>
                        <li><a href="{{asset('pharmacopee')}}">Pharmacopees</a></li>
                    </ul>
                </li>

                <li><a class="waves-effect" href="{{asset('equipements')}}" aria-expanded="false"><i
                    class="icon-notebook fa-fw"></i> <span class="hide-menu"> Equipements </span></a></li>

                    <li><a class="waves-effect" href="{{asset('clients')}}" aria-expanded="false"><i
                        class="icon-notebook fa-fw"></i> <span class="hide-menu"> Clients et Fournisseurs</span></a></li>

                {{-- <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i
                                class="icon-notebook fa-fw"></i> <span class="hide-menu"> Equipements </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{asset('form-basic')}}">Physico</a></li>
                        <li><a href="{{asset('form-layout')}}">Microbio</a></li>
                        <li><a href="{{asset('icheck-control')}}">PC</a></li>
                        <li><a href="{{asset('form-advanced')}}">Autres</a></li>
                    </ul>
                </li> --}}
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i
                                class="icon-grid fa-fw"></i> <span class="hide-menu">Labos et Personels</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{asset('#')}}">Physico</a></li>
                        <li><a href="{{asset('#')}}">Microbio</a></li>
                        <li><a href="{{asset('#')}}">Personels</a></li>
                        <li><a href="{{asset('bootstrap-tables')}}">Autres</a></li>
                    </ul>
                </li>
                <li>
                    <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><i
                                class="icon-layers fa-fw"></i> <span class="hide-menu"> Extra</span></a>
                    <ul aria-expanded="false" class="collapse extra">
                        <li>
                            <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><span
                                        class="hide-menu"> Inbox </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{asset('inbox')}}">Mail Box</a></li>
                                <li><a href="{{asset('inbox-detail')}}">Mail Details</a></li>
                                <li><a href="{{asset('compose')}}">Compose Mail</a></li>
                                <li><a href="{{asset('contact')}}">Contact</a></li>
                                <li><a href="{{asset('contact-detail')}}">Contact Detail</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{asset('calendar')}}" aria-expanded="false"><span
                                        class="hide-menu">Calendar</span></a>
                        </li>
                        <li>
                            <a href="{{asset('widgets')}}" aria-expanded="false"><span
                                        class="hide-menu"> Widgets </span></a>
                        </li>
                        <li>
                            <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><span
                                        class="hide-menu"> Charts</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{asset('morris-chart')}}">Morris Chart</a></li>
                                <li><a href="{{asset('peity-chart')}}">Peity Charts</a></li>
                                <li><a href="{{asset('knob-chart')}}">Knob Charts</a></li>
                                <li><a href="{{asset('sparkline-chart')}}">Sparkline charts</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><span
                                        class="hide-menu"> Icons</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{asset('simple-line')}}">Simple Line</a></li>
                                <li><a href="{{asset('fontawesome')}}">Fontawesome</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="waves-effect" href="javascript:void(0);" aria-expanded="false"><span
                                        class="hide-menu"> Maps</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{asset('map-google')}}">Google Map</a></li>
                                <li><a href="{{asset('map-vector')}}">Vector Map</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
