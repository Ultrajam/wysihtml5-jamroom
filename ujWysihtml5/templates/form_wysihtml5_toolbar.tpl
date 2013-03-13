<div id="wysihtml5-toolbar-{$field_name}" class="wysihtml5-toolbar" style="display:none;">
    <a class="form_button btn btn-mini" data-wysihtml5-command="bold" title="CTRL+B">bold</a>
    <a class="form_button btn btn-mini" data-wysihtml5-command="italic" title="CTRL+I">italic</a>
    <a class="form_button btn btn-mini" data-wysihtml5-command="underline" title="CTRL+I">underline</a>
{*    <a class="form_button btn btn-mini" data-wysihtml5-command="justifyRight" title="CTRL+I">jleft</a>
    <a class="form_button btn btn-mini" data-wysihtml5-command="justifyCenter" title="CTRL+I">jcenter</a>
    <a class="form_button btn btn-mini" data-wysihtml5-command="justifyRight" title="CTRL+I">jright</a> *}
    <a class="form_button btn btn-mini" data-wysihtml5-command="createLink">link</a>
    <a class="form_button btn btn-mini" data-wysihtml5-command="insertImage">image</a>
    <a class="form_button btn btn-mini" data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1">h1</a>
    <a class="form_button btn btn-mini" data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2">h2</a>
    <a class="form_button btn btn-mini" data-wysihtml5-command="insertUnorderedList">ol</a>
    <a class="form_button btn btn-mini" data-wysihtml5-command="insertOrderedList">ul</a>
{*    <a class="form_button btn btn-mini" data-wysihtml5-command="Outdent" title="Outdent">outdent</a>
    <a class="form_button btn btn-mini" data-wysihtml5-command="Indent" title="Indent">indent</a> *}
    <a class="form_button btn btn-mini" data-wysihtml5-command="foreColor" data-wysihtml5-command-value="red">red</a>
    <a class="form_button btn btn-mini" data-wysihtml5-command="foreColor" data-wysihtml5-command-value="green">green</a>
    <a class="form_button btn btn-mini" data-wysihtml5-command="foreColor" data-wysihtml5-command-value="blue">blue</a>
    <a class="form_button btn btn-mini" data-wysihtml5-command="insertSpeech">speech</a>
    <a class="form_button btn btn-mini" data-wysihtml5-command="insertHTML" data-wysihtml5-command-value="<blockquote>foobar</blockquote>">insert quote</a>
    <a class="form_button btn btn-mini" data-wysihtml5-command="fontSize" data-wysihtml5-command-value="small">small</a>
{*    <a class="form_button btn btn-mini" data-wysihtml5-command="fontSize" data-wysihtml5-command-value="large">large</a>
    <a class="form_button btn btn-mini" data-wysihtml5-command="insertHTML" data-wysihtml5-command-value="<h2>rrrr</h2>">jrEmbed</a>
    <ul class="dropdown-menu">
        <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="div">Normal text</a></li>
        <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1">Heading 1</a></li>
        <li><a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2">Heading 2</a></li>
    </ul>
              <a data-wysihtml5-command-group="foreColor" class="fore-color" title="Color the selected text" class="command">
            <ul>
              <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="silver"></li>
              <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="gray"></li>
              <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="maroon"></li>
              <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="red"></li>
              <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="purple"></li>
              <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="green"></li>
              <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="olive"></li>
              <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="navy"></li>
              <li data-wysihtml5-command="foreColor" data-wysihtml5-command-value="blue"></li>
            </ul>
          </a>
          *}
{*    <a class="form_button btn btn-mini" data-wysihtml5-action="change_view">html viewx</a>
    <div data-wysihtml5-dialog="insertHTML" style="display: none;">
      <label>
        Link:
        <input data-wysihtml5-dialog-field="href" value="http://">
      </label>
      <a class="form_button btn btn-mini" data-wysihtml5-dialog-action="save">OKccc</a>&nbsp;<a class="form_button btn btn-mini" data-wysihtml5-dialog-action="cancel">Cancel</a>
    </div> *}
    
    <div data-wysihtml5-dialog="createLink" style="display: none;">
      <label>
        Link:
        <input data-wysihtml5-dialog-field="href" value="http://">
      </label>
      <a class="form_button btn btn-mini" data-wysihtml5-dialog-action="save">OK</a>&nbsp;<a class="form_button btn btn-mini" data-wysihtml5-dialog-action="cancel">Cancel</a>
    </div>
    
    <div data-wysihtml5-dialog="insertImage" style="display: none;">
      <label>
        Image:
        <input data-wysihtml5-dialog-field="src" value="http://">
      </label>
      <label>
        Align:
        <select data-wysihtml5-dialog-field="className">
          <option value="">default</option>
          <option value="wysiwyg-float-left">left</option>
          <option value="wysiwyg-float-right">right</option>
        </select>
      </label>
      <a class="form_button btn btn-mini" data-wysihtml5-dialog-action="save">OK</a>&nbsp;<a class="form_button btn btn-mini" data-wysihtml5-dialog-action="cancel">Cancel</a>
    </div>
</div>

