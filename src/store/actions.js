import Axios from "axios";

const apiUrl = `${cfadminObj.apiUrl}/cofixer/v1/settings`;

export const actions = {
    SAVE_SETTINGS:( { commit }, payload )=>{
        commit( 'SAVING' );
        Axios.post( apiUrl,{
            firstname: payload.firstname,
            lastname : payload.lastname,
            email    : payload.email,
        },{
            headers:{
                'content-type': 'application/json',
                'X-WP-Nonce': cfadminObj.apiNonce,
            }
        })
        .then(( response )=>{
            console.log(response);
            commit( 'SAVED' )
        })
        .catch( ( error )=>{
            console.log( error )
        })
    },

    FETCH_SETTINGS: ( { commit }, payload ) => {
        Axios.get( apiUrl,{
            headers:{
                'content-type': 'application/json',
                'X-WP-Nonce': cfadminObj.apiNonce,
            }
        })
        .then( ( response ) => {
            payload = response.data
            commit( 'UPDATE_SETTINGS', payload )
        })
        .catch( ( error ) => {
            console.log( error )
        })
    }
};