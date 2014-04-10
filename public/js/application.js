/**
 * application.js
 */

var MOBILE = MOBILE || {
  animationDuration: 300,
  itemsPerPage: 20,
  listPages: ['home'],
  activePage: function() {
    return $($.mobile.activePage[0]);
  },
  initListPage: function(page) {
    var $page = $(page);
    $page.jqmData('query', {
      start: 0,
      count: MOBILE.itemsPerPage,
      itemsOnly: true
    });
    MOBILE.listPageUpdateQueryFromForm($page);
    var loadMoreNode = $('.load-more', page);
    loadMoreNode.click(MOBILE.loadMoreClick);
    $page.jqmData('loadMoreNode', loadMoreNode);
    $page.jqmData('noMoreNode', $('.no-more', page));

    $('form', page).submit(MOBILE.listPageFormChange);
    $('form :input', page).change(MOBILE.listPageFormChange);
  },
  loadMoreClick: function(e) {
    e.preventDefault();
    e.stopPropagation();
    var $page = MOBILE.activePage();
    var query = $page.jqmData('query');
    query.start = query.start + MOBILE.itemsPerPage;
    $page.jqmData('query', query);
    $page.jqmData('loadMoreNode').removeClass('ui-btn-active');
    $page.jqmData('noMoreNode').hide();
    MOBILE.listPageLoadItems();
  },
  listPageLoadItems: function() {
    var $page = MOBILE.activePage();
    var $loadMoreNode = $page.jqmData('loadMoreNode');
    var query = $page.jqmData('query');

    $.mobile.loading('show');
    $loadMoreNode.addClass('ui-disabled');

    if (query.start === 0) {
      $('[data-role="listview"]', $page).empty();
    }

    $.ajax({
      url: $loadMoreNode.attr('href'),
      data: query,
      success: MOBILE.loadMoreSuccess,
      dataType: 'html'
    });
  },
  loadMoreSuccess: function(html) {
    var $page = MOBILE.activePage();
    var $loadMoreNode = $page.jqmData('loadMoreNode');
    if (html === '') {
      $page.jqmData('noMoreNode').show();
      $loadMoreNode.hide();
    }
    else {
      $('[data-role="listview"]', $page).append(html);
      $loadMoreNode.show();
    }
    $loadMoreNode.removeClass('ui-disabled');
    $.mobile.loading('hide');
    $page.trigger('create');
    $('[data-role="listview"]', $page).listview('refresh');
    MOBILE.initDisqusCounts();
  },
  listPageUpdateQueryFromForm: function($page) {
    var query = $page.jqmData('query');
    query.start = 0;
    var $form = $('form', $page);
    $.each($form.serializeArray(), function(i, o) {
      if (o.value === '') {
        delete query[o.name];
      }
      else {
        query[o.name] = o.value;
      }
    });
    $page.jqmData('query', query);
  },
  listPageFormChange: function(e) {
    e.preventDefault();
    var $page = MOBILE.activePage();
    MOBILE.listPageUpdateQueryFromForm($page);
    $page.jqmData('noMoreNode').hide();
    MOBILE.listPageLoadItems();
  },
  pageInit: function(event) {
    var page = event.target;
    if ($.inArray(page.id, MOBILE.listPages) >= 0) {
      MOBILE.initListPage(page);
    }

    $('.link-full-site', page).click(MOBILE.linkFullSiteClick);
    $('.panel-close', page).click(function(event) {
      event.preventDefault();
      $('[data-role="panel"]', page).panel('close');
    });
    MOBILE.initLinks(page);
    MOBILE.initShareThis(page);
    MOBILE.initTabs(page);
    MOBILE.initCaptions(page);
    MOBILE.initDisqusCounts(page);
  },
  pageRemove: function(event) {
    event.preventDefault();
  },
  pageBeforeShow: function(event) {
    var page = event.target;
    MOBILE.initCommentsButtons(page);
    $('.ui-collapsible:not(".ui-collapsible-collapsed")').each(function() {
      $('> h1 > a', this).click();
    });
    $('a.ui-link', page)
      .not(".ui-btn, .ui-link-inherit, :jqmData(role='none'), :jqmData(role='nojs')")
      .removeClass('ui-link-active')
      .click(function(e) {
        $(this).addClass('ui-link-active')
      });
  },
  pageChange: function(event, data) {
    try {
      // This fires twice for each page load but only one has a `toPage`
      // attribute, so we use that to only fire the tracking once.
      if (data.hasOwnProperty('toPage')) {
        // We only want to track pages loaded via AJAX.  The `activeIndex` is
        // 0 on the ititial page load.
        if ($.mobile.urlHistory.activeIndex > 0) {
          dataLayer = dataLayer || [];
          dataLayer.push({'event': 'ajax.page.call'});
        }
      }
    }
    catch (e) {}
  },
  pageBeforeChange: function(event, data) {
    if (data.toPage === data.absUrl) {
      var page = MOBILE.activePage();
      var $panel = $('[data-role="panel"]', page);
      $panel.panel('close');
      $panel.find('li.ui-btn-active').removeClass('ui-btn-active');
    }
  },
  initLinks: function(page) {
    // Don't make ajax requests for links in body content.
    var domain = $.mobile.path.documentBase.domain;
    $('.node-body a', page).each(function(i, link) {
      if (link.href.indexOf(domain) !== 0) {
        $(link).attr('data-ajax', false);
      }
    });

    $('.to-top', page).click(function(e) {
      e.preventDefault();
      $.mobile.silentScroll(0);
    });

  },
  linkFullSiteClick: function(event) {
    $.cookie('mobile_desktop_only', 'true', {
      expires: 365,
      path: '/',
      domain: document.domain.split('.').slice(-2).join('.')
    });
  },
  initShareThis: function(page) {
    if ($('.st_sharethis_large', page).length === 0) {
      return;
    }
    if (typeof(stLight) == 'undefined') {
      window.switchTo5x=false;
      $.getScript('http://w.sharethis.com/button/buttons.js', function() {
          stLight.options({publisher: "896fee10-e6af-4b13-9a41-acec0939c175", doNotHash: true, doNotCopy: true, hashAddressBar: false});
      });
    }
    else {
      stButtons.locateElements();
    }
  },
  initCommentsButtons: function(pageNode) {
    if ($('.disqus_data', pageNode).length === 0) {
      return;
    }
    $('.comments-button', pageNode).click(function(event) {
      event.preventDefault();
      if ($('#disqus_thread', pageNode).length === 0) {
        MOBILE.initDisqusOnPage(pageNode);
      }
      var pos = $('.disqus_data', pageNode).offset().top;
      $.mobile.silentScroll(pos);
      $('.load-comments-button', pageNode).hide();
    });
    if ($('#disqus_thread', pageNode).length === 0) {
      $('.load-comments-button', pageNode).show();
    }
  },
  initDisqusCounts: function(pageNode) {
    var threads = [],
        disqus_shortname;

    $("[data-disqus-identifier]:not(.disqus-count-processed)", pageNode).each(function() {
      threads.push('ident:' + $(this).attr('data-disqus-identifier'));
      disqus_shortname = $(this).attr('data-disqus-domain');
    });

    if (threads.length == 0) {
      return;
    }

    $.ajax({
      type: 'GET',
      url: 'https://disqus.com/api/3.0/threads/set.jsonp',
      data: {
        api_key: DISQUS_PUBLIC_KEY,
        forum: disqus_shortname,
        thread: threads
      },
      cache: false,
      dataType: 'jsonp',
      success: function(response) {
        $.each(response.response, function(i, thread) {
          var ident = thread.identifiers[0];
          var text = thread.posts + ((thread.posts == 1) ? ' Comment' : ' Comments');
          $('[data-disqus-identifier="' + ident + '"]', pageNode)
            .text(text)
            .addClass('disqus-count-processed');
        });
      }
    });

  },
  initDisqusOnPage: function(pageNode) {
    // Add & initialize disqus on next page.
    if ($('.disqus_data', pageNode).length > 0) {
      // Get disqus data.
      var $disqus_data_node = $('.disqus_data', pageNode);
      var shortname = $disqus_data_node.attr('data-disqus_shortname');
      var identifier = $disqus_data_node.attr('data-disqus_identifier');
      var title = $disqus_data_node.attr('data-disqus_ta_node_title');
      var url = $disqus_data_node.attr('data-disqus_url');

      // Load or reset disqus.
      if (typeof(DISQUS) == 'undefined') {
        // Initial disqus load.
        $('<div id="disqus_thread"></div>').insertAfter($disqus_data_node);
        window.disqus_shortname = shortname;
        window.disqus_identifier = identifier;
        window.disqus_title = title;
        window.disqus_url = url;
        $.getScript('//' + shortname + '.disqus.com/embed.js');
      }
      else {
        // Disqus already loaded, just reset.
        $('#disqus_thread').detach().insertAfter($disqus_data_node);
        DISQUS.reset({
          reload: true,
          config: function() {
            this.page.identifier = identifier;
            this.page.title = title;
            this.page.url = url;
          }
        });
      }
    }
  },
  initCaptions: function(pageNode) {
    $('.text img[alt]', pageNode).each(function() {
      var $img = $(this);
      var caption = $img.attr('alt');
      if (caption.length) {
        $img.after('<p class="caption">' + caption + '</p>');
      }
    });
  },
  initTabs: function(pageNode) {
    var $tabs = $('.tabs:not(.processed)', pageNode);
    if ($tabs.length) {
      $tabs.find('.tabs-header a').click(MOBILE.tabClick)
      $tabs.find('.tabs-header a:eq(0)').click();
      $tabs.addClass('processed');
    }
  },
  tabClick: function(e) {
    var $tab = $(this);
    var $tabs = $tab.closest('.tabs');
    var target = $tab.attr('href');
    $tabs.find('.tabs-header a').removeClass('active');
    $tab.addClass('active');
    $tabs.find('.tabs-body > *').hide();
    $tabs.find(target).show();
  },
  init: function() {
    $(document).on("pageinit", MOBILE.pageInit);
    $(document).on("pagebeforeshow", MOBILE.pageBeforeShow);
    $(document).on("pagechange", MOBILE.pageChange);
    $(document).on("pageremove", MOBILE.pageRemove);
    $(document).on("pagebeforechange", MOBILE.pageBeforeChange);
    $.mobile.defaultPageTransition = 'slide';
  }
};

MOBILE.init();
