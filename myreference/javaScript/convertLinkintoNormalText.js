function bracketChanger(str) {
    let v = str.replaceAll('<', '&lt;').replaceAll('>', '&gt;');
    return v;
}

function charIncodeToBrackets(str) {
    let v = str.replaceAll('&lt;', '<').replaceAll('&gt;', '>');
    return v;
}