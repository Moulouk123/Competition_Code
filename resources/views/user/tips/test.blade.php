<html>
<header>
<style>
:root {
        --var-padding: 1em;
        --highlight: hsl(265, 87%, 15%);
        --highlight-dark: hsl(261, 54%, 58%);
        --logo-width: 6em;
        --logo-offset: 1em;
        --main-column-width: 25em;
      }
      .app {
        position: relative;
        padding-left: .5em;
        max-width:80em;
        background: hsl(0, 0%, 100%) 100% linear-gradient(hsl(272, 85%, 26%) 0%, hsl(277, 87%, 17%) 50%, hsl(280, 90%, 20%) 50%, hsl(275, 38%, 24%) 100%);
        background-size: auto 10em ;
        background-repeat: repeat-x;
        background-position: center top;
      }

      .hello {
        height:500px;
        position: relative;
        height: 10em;
        grid-row: 1 / 3;
        grid-column: 2;
        background: url("{{asset('assets/images/open.avif')}}");
        background-size: cover;
        background-position: right center;

        img {
          display: block;
          max-width: 100%;
        }
      }

      main {
        padding: var(--var-padding);
        min-width: var(--main-column-width);
        grid-row: 2;
        grid-column: 1;
        background: #ffffff;

      }




      @media (min-width: 37.5em) {
        :root {
          --var-padding: 3em;
        }

        .app {
          display: grid;
          margin: 3em auto;
          grid-template-rows: 5em auto;
          grid-template-columns: 1.4fr 1fr;
          padding-left: 2em;
          background-size: auto;

          &::after {
            position: absolute;
            right: 1em;
            left: 1em;
            bottom: 0;
            z-index: -1;
            width: 95%;
            height: 200px;
            content: '';
            box-shadow: 0 0 5em hsl(22, 23%, 40%);
          }
        }

      }


</style>
</header>
<div class="app">
<div class="hello"><img src="{{asset('assets/images/open.avif')}}" alt="Header Image"></div>
<main style="height:400px;">
    <h1 style="color:vi"> {{$tip->title}}</h1>
    <h2> {{$tip->description}}</h2>
      <p> {{$tip->contenu}}</p>
    </main>

</div>
</html>
