# HtmlTag

A PHP library to generate HTML tags and attribute strings.


## Development status

I still need to fine-tune the API..
Feedback is welcome.

## Similar libraries

Have a look at https://github.com/thecodingmachine/html.tags


## Usage

    $attributes = (new HtmlAttributes())
      ->set('id', 'theId')
      ->addClass('theClass')
      ->addStyle('color', 'green')
    ;
    print $attributes->DIV('contents') . "\n";
    print $attributes->HR(NULL) . "\n";
    print '<pre' . $attributes . '>text in a span</pre>';

> <div id="theId" class="theClass" style="color: green;">contents</div>
> <hr />
> <pre id="theId" class="theClass" style="color: green;">text in a pre</pre>
