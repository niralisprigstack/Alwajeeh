<div data-role="page" id="list">
    <div data-role="content">
        
        <ul data-role="listview">
            <li data-role="list-divider" id="a">A</li>
            <li class="showDetails">
                Adam Kinkaid
            </li>
            <li class="showDetails">Alex Wickerham</li>
            <li class="showDetails">Avery Johnson</li>
            <li data-role="list-divider" id="b">B</li>
            <li class="showDetails">Bob Cabot</li>
            <li data-role="list-divider" id="c">C</li>
            <li class="showDetails">Caleb Booth</li>
            <li class="showDetails">Christopher Adams</li>
            <li class="showDetails">Culver James</li>
            <li data-role="list-divider" id="d">D</li>
            <li class="showDetails">David Walsh</li>
            <li class="showDetails">Drake Alfred</li>
            <li data-role="list-divider" id="e">E</li>
            <li class="showDetails">Elizabeth Bacon</li>
            <li class="showDetails">Emery Parker</li>
            <li class="showDetails">Enid Voldon</li>
            <li data-role="list-divider" id="f">F</li>
            <li class="showDetails">Francis Wall</li>
            <li data-role="list-divider" id="g">G</li>
            <li class="showDetails">Graham Smith</li>
            <li class="showDetails">Greta Peete</li>
            <li data-role="list-divider" id="h">H</li>
            <li class="showDetails">Harvey Walls</li>
            <li data-role="list-divider" id="m">M</li>
            <li class="showDetails">Mike Farnsworth</li>
            <li class="showDetails">Murray Vanderbuilt</li>
            <li data-role="list-divider" id="n">N</li>
            <li class="showDetails">Nathan Williams</li>
            <li data-role="list-divider" id="p">P</li>
            <li class="showDetails">Paul Baker</li>
            <li class="showDetails">Pete Mason</li>
            <li data-role="list-divider" id="r">R</li>
            <li class="showDetails">Rod Tarker</li>
            <li data-role="list-divider" id="s">S</li>
            <li class="showDetails">Sawyer Wakefield</li>
        </ul>
        
        <ul data-role="none" id="list-navigation">
            <li>
                <p id="list-1" class="scrollToSelected"><strong>1</strong></p>
                <p id="list-2" class="scrollToSelected"><strong>2</strong></p>
                <p id="list-3" class="scrollToSelected"><strong>3</strong></p>
                <p id="list-a" class="scrollToSelected"><strong>A</strong></p>
                <p id="list-b" class="scrollToSelected"><strong>B</strong></p>
                <p id="list-c" class="scrollToSelected"><strong>C</strong></p>
                <p id="list-d" class="scrollToSelected"><strong>D</strong></p>
                <p id="list-e" class="scrollToSelected"><strong>E</strong></p>
                <p id="list-f" class="scrollToSelected"><strong>F</strong></p>
                <p id="list-g" class="scrollToSelected"><strong>G</strong></p>
                <p id="list-h" class="scrollToSelected"><strong>H</strong></p>
                <p id="list-i" class="scrollToSelected"><strong>I</strong></p>
                <p id="list-j" class="scrollToSelected"><strong>J</strong></p>
                <p id="list-k" class="scrollToSelected"><strong>K</strong></p>
                <p id="list-l" class="scrollToSelected"><strong>L</strong></p>
                <p id="list-m" class="scrollToSelected"><strong>M</strong></p>
                <p id="list-n" class="scrollToSelected"><strong>N</strong></p>
                <p id="list-o" class="scrollToSelected"><strong>O</strong></p>
                <p id="list-p" class="scrollToSelected"><strong>P</strong></p>
                <p id="list-q" class="scrollToSelected"><strong>Q</strong></p>
                <p id="list-r" class="scrollToSelected"><strong>R</strong></p>
                <p id="list-s" class="scrollToSelected"><strong>S</strong></p>
                <p id="list-t" class="scrollToSelected"><strong>T</strong></p>
                <p id="list-u" class="scrollToSelected"><strong>U</strong></p>
                <p id="list-v" class="scrollToSelected"><strong>V</strong></p>
                <p id="list-w" class="scrollToSelected"><strong>W</strong></p>
                <p id="list-x" class="scrollToSelected"><strong>X</strong></p>
                <p id="list-y" class="scrollToSelected"><strong>Y</strong></p>
                <p id="list-z" class="scrollToSelected"><strong>Z</strong></p>
            </li>
        </ul>
        
    </div>
</div>

<div data-role="page" id="details">
    <div data-role="content">
        
        <ul data-role="listview">
            <li data-role="list-divider">Details</li>
            <li><a href="#list" data-direction="reverse">List</a></li>
        </ul>
        <br />
        <p>
            Here are the details you were looking for
        </p>
        
    </div>
</div>
<script>
    $('.scrollToSelected').bind('click', function() {
    var view = $(this).attr('id');
    var list = view.split('-');
    var elem = $("#"+list[1]);
    
    // not sure if this is offset or position
    var position = elem.position(); 
    var offset   = elem.offset();
    
    //alert('left: '+position.left + ", top: " + position.top);
    //alert('left: '+offset.left + ", top: " + offset.top);
    
    $.mobile.silentScroll(position.top);
    //$.mobile.silentScroll(offset.top);
    
});

$('.showDetails').bind('click', function() {
    $.mobile.changePage( "#details", { transition: "slideup"} );
});
</script>