(function () {

    console.log("funciona");
    // crea un enlace y en automático le hacemos click para situarnos en parte deseada de la página. El otro enlace se encuentra en el Header
    var link = document.createElement("a");
    link.setAttribute("href", "#enlace");
    //link.setAttribute("download", "");
    //link.setAttribute("id", "milink");
    //generamos el click al link dentro de la funcion 
    link.click();


    let currentPageIndex = 0;
    let pageMode = 1;
    let cursorIndex = Math.floor(currentPageIndex / pageMode);
    let pdfInstance = null;
    let totalPagesCount = 0;

    const viewport = document.querySelector("#viewport");
    window.initPDFViewer = function (pdfURL) {
        pdfjsLib.getDocument(pdfURL).then(pdf => {
            pdfInstance = pdf;
            totalPagesCount = pdf.numPages;
            initPager();
            initPageMode();
            render();
            console.log(totalPagesCount); //imprime numero de páginas
            console.log(currentPageIndex + 1); //imprime número de página actual
            $('#numero_pagina').text(currentPageIndex + 1);
            $('#total_paginas').text(totalPagesCount);
        });
    };

    function onPagerButtonsClick(event) {
        const action = event.target.getAttribute("data-pager");
        if (action === "prev") {
            if (currentPageIndex === 0) {
                return;
            }
            currentPageIndex -= pageMode;
            if (currentPageIndex < 0) {
                currentPageIndex = 0;
            }
            $('#numero_pagina').text(currentPageIndex + 1);
            $('#total_paginas').text(totalPagesCount);
            render();
        }
        if (action === "next") {
            if (currentPageIndex === totalPagesCount - 1) {
                return;
            }
            currentPageIndex += pageMode;
            if (currentPageIndex > totalPagesCount - 1) {
                currentPageIndex = totalPagesCount - 1;
            }
            $('#numero_pagina').text(currentPageIndex + 1);
            $('#total_paginas').text(totalPagesCount);
            render();
        }
    }
    function initPager() {
        const pager = document.querySelector("#pager");
        pager.addEventListener("click", onPagerButtonsClick);
        return () => {
            pager.removeEventListener("click", onPagerButtonsClick);
        };
    }

    function onPageModeChange(event) {
        pageMode = Number(event.target.value);
        render();
    }
    function initPageMode() {
        const input = document.querySelector("#page-mode input");
        input.setAttribute("max", totalPagesCount);
        input.addEventListener("change", onPageModeChange);
        return () => {
            input.removeEventListener("change", onPageModeChange);
        };
    }

    function render() {
        cursorIndex = Math.floor(currentPageIndex / pageMode);
        const startPageIndex = cursorIndex * pageMode;
        const endPageIndex =
            startPageIndex + pageMode < totalPagesCount
                ? startPageIndex + pageMode - 1
                : totalPagesCount - 1;

        const renderPagesPromises = [];
        for (let i = startPageIndex; i <= endPageIndex; i++) {
            renderPagesPromises.push(pdfInstance.getPage(i + 1));
        }

        Promise.all(renderPagesPromises).then(pages => {
            const pagesHTML = `<div  style="width: ${
                pageMode > 1 ? "50%" : "100%"
                }"><canvas></canvas></div>`.repeat(pages.length);
            viewport.innerHTML = pagesHTML;
            pages.forEach(renderPage);
        });
    }

    function renderPage(page) {
        let pdfViewport = page.getViewport(1);

        const container =
            viewport.children[page.pageIndex - cursorIndex * pageMode];
        pdfViewport = page.getViewport(container.offsetWidth / pdfViewport.width);
        const canvas = container.children[0];
        const context = canvas.getContext("2d");
        canvas.height = pdfViewport.height;
        canvas.width = pdfViewport.width;

        page.render({
            canvasContext: context,
            viewport: pdfViewport
        });
    }

    // descarga PDF
    /*document.getElementById('descarga-pdf')
         .addEventListener('click', (e) => {*/
    //console.log('hola');
    //var ancla = document.getElementById("milink");
    //ancla.href='pdf/Consulta de Adeudo Predial __ Municipio de Zapopan Jalisco.pdf' ;
    //$('.milink').href;
    //window.location.href='<a href="pdf/Consulta de Adeudo Predial __ Municipio de Zapopan Jalisco.pdf" id="milink" download></a>');
    //var ancla = document.getElementById('milink');
    //document.getElementById("my_pdf_viewer").innerHTML = ancla.href;


    /*var ruta = document.querySelector("#nombre_partitura").value;
    console.log("ruta:" + ruta);
    

    var link = document.createElement("a");
    link.setAttribute("href", "pdf/" + ruta);
    link.setAttribute("download", "");*/


    //link.setAttribute("id", "milink"); 
    //generamos el click al link dentro de la funcion 
    //console.log("Archivo descargó");
    // link.click();


    //document.getElementById('download').append(link);

    //document.getElementById('download').innerHTML='<a href="pdf/Consulta de Adeudo Predial __ Municipio de Zapopan Jalisco.pdf" id="milink" download>Download</a>';


    /*var ancla = document.getElementById("milink2");
    var var1 = ancla.getAttribute("href");*/

    //console.log(var1);
    //  }); 

    // Visor PDF
    document.getElementById('ver-pdf-2')
        .addEventListener('click', (e) => {
            var ruta2 = document.querySelector("#nombre_partitura_2").value;
            console.log("ruta:" + ruta2);

            var link2 = document.createElement("a");
            link2.setAttribute("href", "web/viewer.html?file=../pdf/" + ruta2);
            //link.setAttribute("download", "");
            //link.setAttribute("id", "milink");
            //generamos el click al link dentro de la funcion 

            link2.click();


            //document.getElementById('download').append(link);

            //document.getElementById('download').innerHTML='<a href="pdf/Consulta de Adeudo Predial __ Municipio de Zapopan Jalisco.pdf" id="milink" download>Download</a>';


            /*var ancla = document.getElementById("milink2");
            var var1 = ancla.getAttribute("href");*/

            //console.log(var1);
        });





})();
