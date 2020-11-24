<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li><a href="{{url('home')}}"><i class="fa fa-home text-yellow"></i> <span>Dashboard</span></a></li>
    @if(Auth::user()['role_id']==1)
        <li><a href="{{url('kecamatan')}}"><i class="fa fa-folder text-yellow"></i> <span>Area/Lokasi TPS</span></a></li>
        <li><a href="{{url('pengguna')}}"><i class="fa fa-folder text-yellow"></i> <span>Daftar Saksi</span></a></li>
    @endif
    @if(Auth::user()['role_id']==2)
        <li><a href="{{url('pemilihan')}}"><i class="fa fa-folder text-yellow"></i> <span>Pemilihan</span></a></li>
        <li><a href="{{url('pemilihan/file')}}"><i class="fa fa-folder text-yellow"></i> <span>Bukti Hasil TPS</span></a></li>
    @endif
</ul>