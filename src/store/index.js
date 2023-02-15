import {createStore} from "vuex";

import { actions } from "./actions.js";
import { mutations } from "./mutations.js";
import { getters } from "./getters.js";

const store = createStore({
    state:{
        settings:{
            general:{
                firstname: '',
                lastname: '',
                email: ''
            }
        },
        loadingText: "Save Settings",
    },
    actions,
    mutations,
    getters
});

export default store;