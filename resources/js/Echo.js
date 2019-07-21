import store from './store/store.js'

Echo.join('chat')
.here(users => {
    store.commit('LOAD_USERS', users)
})
.joining(user => {
    store.commit('JOIN_USER', user)
})
.leaving(user => {
    store.commit('LEAVE_USER', user)
})
.listen('Chat.MessageCreated', e => {
    store.commit('ADD_MESSAGE', e.message)
})
