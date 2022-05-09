
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Top navbar example · Bootstrap v5.1</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/navbar-static/">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <!-- <link href="/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

    <!-- Favicons -->
    <!--
    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
    -->

    <meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <!-- <link href="navbar-top.css" rel="stylesheet"> -->
  </head>
  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="/admin">Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('admin.forms.index') }}">Forms</a>
            </li>
        </ul>
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>


    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script>
    $(document).ready(function () {
      /**
      * Add button click handler
      */
        function onAdd() {
          var $ul, li, $li, $label, $div, value, $btn;
          value = $('.js-new-item').val();
          //validate against empty values
          if (value === '') {
            return;
          }

          $ul = $('ul#options');
          $li = $('<li>').appendTo($ul);
          $div = $('<div>')
            //.addClass('checkbox')
            .appendTo($li);

          $label = $('<label>').appendTo($div);
          $('<input>')
            .attr('type', 'hidden')
            .attr('value', value)
            .attr('name', 'option[]')
            //.click(toggleRemoved)
            .appendTo($label);

          $label
            .append(value);

          //$btn = $('<btn>').appendTo($div);

          // $btn.addClass('btn btn-sm')
          //   .html;
          $('<button>')
            .attr('type', 'button')
            .addClass('js-item')
            .html('del')
            .click(toggleRemoved)
            .appendTo($div);


          $('.js-new-item').val('');
        }
        /**
        * Checkbox click handler -
        * toggles class removed on li parent element
        * @param ev
        */
        function toggleRemoved(ev) {
          var $el;
          $el = $(ev.currentTarget);
          //$el.closest('li').toggleClass('removed');
          $el.closest('li').remove();
        }

        $('.js-add').click(onAdd);
        $('.js-item').click(toggleRemoved);
      });
      </script>
  </body>
</html>
