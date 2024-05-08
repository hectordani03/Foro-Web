function filterString(filter, string) {
    var regex = new RegExp("^" + filter + "$");
    return !regex.test(string);
}
