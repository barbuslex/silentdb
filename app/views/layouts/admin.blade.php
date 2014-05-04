<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SilentDB.it - Administration</title>

    <!-- Bootstrap core CSS -->
    {{ HTML::style('css/bootstrap.min.css') }}

    <!-- Add custom CSS here -->
    {{ HTML::style('css/style-admin.css') }}

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">{{ HTML::link('admin', 'Administration') }}</li>
                <li>{{ HTML::link('/', 'Retour au site') }}</li>
                <li>{{ HTML::link('admin', 'Tableau de bord') }}</li>
                <li>Gestion des utilisateurs</li>
                <li class="divider"></li>
                <li>{{ HTML::link('admin/groups', 'Groupes') }}</li>
                <li>{{ HTML::link('admin/users', 'Utilisateurs') }}</li>
                <li>Gestion des déploiements</li>
                <li class="divider"></li>
                <li>{{ HTML::link('admin/publishers', 'Editeurs') }}</li>
                <li>{{ HTML::link('admin/applications', 'Applications') }}</li>
                <li>{{ HTML::link('admin/versions', 'Version') }}</li>
                <li>{{ HTML::link('admin/deployments', 'Déploiements') }}</li>
            </ul>
        </div>

        <!-- Page content -->
        <div id="page-content-wrapper">
            <div class="content-header">
                @yield('title')
            </div>

            <!-- Keep all page content within the page-content inset div! -->
            <div class="page-content inset">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>

    </div>

    <!-- JavaScript -->
    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}

    @yield('script')

    <!-- Custom JavaScript for the Menu Toggle -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
    });
    </script>
</body>

</html>