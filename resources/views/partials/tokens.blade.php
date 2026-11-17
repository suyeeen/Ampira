<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
    rel="stylesheet">
<style>
    /* Token warna dan huruf Ampira — sama dengan variabel "Ampira / Warna" di Figma */
    :root {
        --bg: #F4F6F5;
        --surface: #FFFFFF;
        --ink: #0B130F;
        --muted: #56665F;
        --line: #E3EAE7;
        --deep: #051C12;
        /* hijau tua: tombol utama, sidebar, kartu hasil */
        --deep2: #123326;
        /* hijau tua lebih terang: elemen di atas --deep */
        --brand: #0E6E66;
        /* teal: tautan, progres, langkah selesai */
        --brand-soft: #E2F1EE;
        --lime: #C6F36B;
        /* aksen: menu aktif, angka hasil, tombol aksen */
        --lime-soft: #F1FBDD;
        --warn: #8A4B00;
        --warn-soft: #FFF1DA;
        --danger: #B42318;
        --danger-soft: #FDECEA;
        --ok: #11743F;
        --ok-soft: #E5F6EC;
        --side-text: #B8C7C0;
        /* teks di atas latar --deep */
        --chip: #EEF2F1;

        --font: 'Plus Jakarta Sans', system-ui, sans-serif;
        --radius-card: 20px;
        --radius-hero: 24px;
        --radius-input: 12px;
        --radius-pill: 999px;
        --shadow-card: 0 4px 16px rgba(10, 18, 15, .06);
    }

    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        background: var(--bg);
        color: var(--ink);
        font-family: var(--font);
    }

    a {
        color: var(--brand);
        text-decoration: none;
    }

    button,
    select {
        font: inherit;
        cursor: pointer;
    }

    .visually-hidden {
        position: absolute;
        width: 1px;
        height: 1px;
        overflow: hidden;
        clip: rect(0 0 0 0);
    }

    button:disabled {
        cursor: not-allowed;
        opacity: .45;
    }

    .isian-input:focus {
        outline: none;
        border-color: var(--brand) !important;
        box-shadow: 0 0 0 3px var(--brand-soft);
    }

    .table-wrap {
        background: var(--surface);
        border: 1px solid var(--line);
        border-radius: var(--radius-card);
        overflow: hidden;
    }

    .table-scroll {
        overflow-x: auto;
    }

    table {
        width: 100%;
        min-width: 620px;
        border-collapse: collapse;
        font-size: 14px;
    }

    thead tr {
        background: var(--chip);
        text-align: left;
    }

    th {
        padding: 12px 20px;
        font-size: 13px;
        font-weight: 600;
        color: var(--muted);
        white-space: nowrap;
    }

    td {
        padding: 13px 20px;
        border-top: 1px solid var(--line);
        vertical-align: middle;
    }
</style>
