import axios from 'axios';
import human from 'human-time'

window.axios = axios;
window.human = human;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
