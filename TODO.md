# TODO: Fix Templating in Welcome and Component Folder

## Tasks

-   [x] Fix @section syntax error in `resources/views/welcome.blade.php`
-   [x] Correct HTML structure in `resources/views/welcome.blade.php`:
    -   [x] Add proper <ul> and <li> for lists in the "about-us" section
    -   [x] Remove extra </span> in "products" section
    -   [x] Remove extra dot after </div> in products description
    -   [x] Fix class name " temukan-kami-map" to "temukan-kami-map" and "align-item" to "align-items" in "kontak" section
-   [x] Update hardcoded links in `resources/views/component/header.blade.php` to use {{ url('/') }}
-   [x] Update hardcoded links in `resources/views/component/footer.blade.php` to use {{ url('/') }}

## Followup

-   [x] Test the views to ensure they render correctly without errors (Server started successfully on http://127.0.0.1:8000)
