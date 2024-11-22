function showApiBlade(id){
    const blade = '#'+id+'_blade';
    const bladebtnshow = '#'+id+'btnshow';
    const bladebtnhide = '#'+id+'btnhide';
    $(blade).removeClass('d-none');
    $(bladebtnshow).addClass('d-none');
    $(bladebtnhide).removeClass('d-none')
}

function hideApiBlade(id){
    const blade = '#'+id+'_blade';
    const bladebtnshow = '#'+id+'btnshow';
    const bladebtnhide = '#'+id+'btnhide';
    $(blade).addClass('d-none');
    $(bladebtnshow).removeClass('d-none');
    $(bladebtnhide).addClass('d-none');
}