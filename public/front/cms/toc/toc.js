/**
 * Toc class gets headers objects, returns them as an array object and renders it in certain element
*/
class Toc {
    static contentWrapper = ".hasToc, .content-wrapper";

    static findHeaders(headers = 'h1, h2, h3, h4') {
        return $(Toc.contentWrapper).find(headers)
                .filter(function(key, value){
                    return value.textContent !== '';
                });
    }

    /** 
     * creates tocData which includes header objects
    */
    constructor() {
        this.data = this.#getData();
    }

    /** 
     * @return Array
     * */
    #getData() {
        let tocData = [];

        Toc.findHeaders()
        .each(function() {
            tocData.push(new Header($(this)));
        });

        return tocData;
    }

    /** 
     * Renders the tocData to certain element.
     * @return Array
    */
    render(renderTo = '.toc-wrapper') {

        $(renderTo).append("<ol class='toc-content-wrapper' style='display: none;'></ol>");
        let tocTable = $(renderTo + ' > ol');

        this.data.forEach(function (header) {
            if (header.parentHeaderId) {
                // create the ol element if it does not exist
                let parentHeader = tocTable.find('a[href="#'+header.parentHeaderId+'"]');

                if (! parentHeader.next("ol").length)
                    parentHeader.after("<ol></ol>");

                parentHeader.next("ol").append('<li><a href="#'+header.id+'">'+header.title+'</a></li>');

            } else {
                tocTable.append('<li><a href="#'+header.id+'">'+header.title+'</a></li>')
            }
        });

        return this.data;
    }

}

/**
 * Header object is used to sort headers, and indicate a few property of header.
*/
class Header {
    /**
     * it creates the data which will be used by Toc class
    */
    constructor(element) {
        this.element = this.#addIdAttribute(element);
        this.id = this.#getId();
        this.title = this.element.text();
        this.headerLevel = Header.getHeaderLevel(this.element);
        this.parentHeaderId = this.#getParentHeaderId();
    }

    /**
     * gets id of element.
    */
    #getId()
    {
        return this.#slug(this.element.text());
    }

    /** adds ID attribute to element
     * @returns {Jquery} object
     */
    #addIdAttribute(element)
    {
        let id = this.#slug(element.text());
        element.attr("id", id);
        // return fresh instance of element which includes id attribute
        return $('#'+id);
    }

    /**
     * gets id name of parent header
     * @returns {String}
     */
    #getParentHeaderId() {
        let parentHeader = '';
        let HeaderObject = this;
        let goToIndex = (Toc.findHeaders().get().length - Toc.findHeaders().index(this.element)) * -1;

        $(Toc.findHeaders().slice(0, goToIndex).get().reverse()).each(function(){
            if(Header.getHeaderLevel($(this)) < HeaderObject.headerLevel) {
                parentHeader = $(this).prop("id");
                return false;
            }
        });

        return parentHeader;
    }

    /**
     * Gets header level of the header tag.
     * @param {documentElement} element
     * @returns {number}
     */
    static getHeaderLevel(element) {
        return parseInt(String(element.prop("tagName")).match(/\d+/g)[0]);
    }

    /**
     * makes sefurl of text
     * @param {String} text
     * @returns {String}
     */
    #slug(text) {
        var trMap = {
            'ç':'c',
            'ğ':'g',
            'ş':'s',
            'ü':'u',
            'ı':'i',
            'ö':'o'
        };
        for(let key in trMap) {
            text = text.replace(new RegExp('['+key+']','g'), trMap[key]);
        }
        return  text.replace(/[^-a-zA-Z0-9\s]+/ig, '') // remove non-alphanumeric chars
                    .replace(/\s/gi, "-") // convert spaces to dashes
                    .replace(/[-]+/gi, "-") // trim repeated dashes
                    .toLowerCase();

    }
}

// render toc table
let toc = new Toc;
toc.render();


// scroll to element
$('.toc-wrapper a').click(function(e) {
    e.preventDefault();
    let href = $(this).attr("href");
    let offset = $(href).offset().top;
    history.pushState({}, null, href);
    let heightFromTop = window.innerWidth > 992 ? offset - 180 : offset - 70;
    $([document.documentElement, document.body]).animate({
        scrollTop: heightFromTop
    }, 1000);
});

$(".js-accordion").click(function () {
    let $this = $(this);
    $this.parents(".toc-wrapper").children(".toc-content-wrapper").slideToggle();
    if($this.children(".toc-show-hide").text() === "Gizle"){
        $this.children(".toc-show-hide").text("Göster");
    }else{
        $this.children(".toc-show-hide").text("Gizle");
    }
});