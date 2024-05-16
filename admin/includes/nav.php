<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Asthaa Admin</a>
    </div>


    <ul class="nav navbar-right top-nav">
        <li><a href="/..index.php">Home</a></li>
        
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Admin 1 <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                
                <li>
                    <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>


    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav" style="height: -webkit-fill-available; background-color: rgba(0, 0, 0, .5);">
            <li>
                <a href=""><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>    
       
            <li>
                 <a href="javascript:;" data-toggle="collapse" data-target="#edit-user"><i class="fa fa-solid fa-user"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                 <ul id="edit-user" class="collapse">
                     <li>
                        <a href="#">Show Users</a>
                     </li>
                     <li>
                        <a href="#">Edit Agents</a>
                     </li>
                     <li>
                        <a href="#">Edit Customers</a>
                     </li>

                </ul>
            </li>        

            <li>
                 <a href="javascript:;" data-toggle="collapse" data-target="#pol"><i class="fa fa-brands fa-edit"></i> Policy <i class="fa fa-fw fa-caret-down"></i></a>
                 <ul id="pol" class="collapse">
                     <li>
                        <a href="#">Show Policy</a>
                     </li>
                     <li>
                        <a href="editpolicy.php">Edit Policy</a>
                     </li>
                </ul>
            </li>
        
            <li>
                 <a href="javascript:;" data-toggle="collapse" data-target="#comp"><i class="fa fa-solid fa-briefcase"></i> Company <i class="fa fa-fw fa-caret-down"></i></a>
                 <ul id="comp" class="collapse">
                     <li>
                        <a href="">Show Company</a>
                     </li>
                     <li>
                        <a href="editcompany.php">Edit Companies</a>
                     </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
