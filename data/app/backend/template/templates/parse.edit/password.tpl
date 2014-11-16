<label>
{$field->getName()}:
    <input type='password' id='{$name}' value='{$field->get()|htmlentities:true:'UTF-8'}' name='{$arrayName}[{$name}]'>
</label>
<br />