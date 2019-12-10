  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">

        <li class="active"><a href="{{route('dash')}}"><i class="fa fa-home"></i> <span>Home</span></a></li>

        <!-- Optionally, you can add icons to the links -->
        <li><a href="{{route('setting')}}"><i class="fa fa-wrench"></i> <span>Configurações</span></a></li>


        <li class="treeview">
          <a href="#"><i class="fa fa-image"></i> <span>Multimédia</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('banner')}}"><i class="fa fa fa-sliders"></i> Banners</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-product-hunt"></i> <span>Produtos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('produto')}}"><i class="fa fa-product-hunt"></i> Produtos</a></li>
            <li><a href="{{route('produto.banner')}}"><i class="fa fa fa-sliders"></i> Banners Produtos</a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-circle-o"></i> Configurador
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{route('color')}}"><i class="fa fa-paint-brush"></i> Cores</a></li>
                  <li><a href="{{route('size')}}"><i class="fa fa-circle-o"></i> Tamanhos</a></li>
                  <li><a href="{{route('familia')}}"><i class="fa fa-circle-o"></i> Familias</a></li>
                  <li><a href="{{route('subfamilia')}}"><i class="fa fa-circle-o"></i> Sub Familias</a></li>
                  <li><a href="{{route('categoria')}}"><i class="fa fa-circle-o"></i> Categoria</a></li>
                  <li><a href="{{route('subcategoria')}}"><i class="fa fa-circle-o"></i> Sub Categorias</a></li>
                </ul>
            
            </li>
          </ul>
        </li>
    


        <li><a href="{{route('menu')}}"><i class="fa fa-align-justify"></i> <span>Menus</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-align-justify"></i> <span>Páginas</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('pagina')}}"><i class="fa fa-plus-circle"></i> Nova Página</a></li>

            @if(count($paginas) > 0)
               @foreach($paginas as $item)
                <li><a href="{{ route('pagina.edit', ['id' => $item->id])}}">{{ $item->nome}}</a></li>
               @endforeach 
            @endif

          </ul>
        </li>
         <li><a href="{{route('social')}}"><i class="fa fa-facebook"></i> <span>Redes Sociais</span></a></li>
         <li><a href="{{route('prazo')}}"><i class="fa fa-truck"></i> <span>Prazos Transporte</span></a></li>
         <li><a href="{{route('newsletter')}}"><i class="fa fa-newspaper-o"></i> <span>Newsletters</span></a></li>
         <li><a href="{{route('orcamento')}}"><i class="fa fa-newspaper-o"></i> <span>Pedidos Orçamentos</span></a></li>
         <li><a href="{{route('expressoes')}}"><i class="fa fa-y-combinator"></i> <span>Expressões</span></a></li>
         <li class="treeview">
            <a href="#"><i class="fa fa-users"></i> <span>Utilizadores</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('user')}}"><i class="fa fa-users"></i><span>Utilizadores</span></a></li>
               <li><a href="{{route('role')}}"><i class="fa fa-gavel"></i> <span>Regras</span></a></li> 
            </ul>
          </li>
         
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
