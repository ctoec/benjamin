jQuery( document ).ready(function() {
    jQuery("a[href$='.pdf']").each(function() {
        var title = 'Download ' + this.textContent;
        jQuery(this).addClass('oec-icon oec-icon--pdf').attr('title', title);
    })

    jQuery("a[href$='.xslx']").each(function() {
        var title = 'Download ' + this.textContent;
        jQuery(this).addClass('oec-icon oec-icon--spreadsheet').attr('title', title);
    })

    jQuery("a[href$='.xsl']").each(function() {
        var title = 'Download ' + this.textContent;
        jQuery(this).addClass('oec-icon oec-icon--spreadsheet').attr('title', title);
    })

    jQuery("a[href$='.doc']").each(function() {
        var title = 'Download ' + this.textContent;
        jQuery(this).addClass('oec-icon oec-icon--doc').attr('title', title);
    })

    jQuery("a[href$='.docx']").each(function() {
        var title = 'Download ' + this.textContent;
        jQuery(this).addClass('oec-icon oec-icon--doc').attr('title', title);
    })
});