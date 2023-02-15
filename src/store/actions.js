import Axios from "axios";

const apiUrl = `${cfadminObj.apiUrl}/cofixer/v1/settings`;

export const actions = {
    SAVE_SETTINGS:( { commit }, payload )=>{
        commit( 'SAVING' );

        Axios.post( apiUrl,{
            firstname: payload.firstname,
            lastname : payload.lastname,
            email    : payload.email,
        })
        .then(( response )=>{
            commit( 'SAVED' )
        })
        .catch( ( error )=>{
            console.log( error )
        })
    },

    FETCH_SETTINGS: ( { commit }, payload ) => {
        Axios.get( apiUrl )
        .then( ( response ) => {
            payload = response.data
            commit( 'UPDATE_SETTINGS', payload )
        } )
        .catch( ( error ) => {
            console.log( error )
        })
    }
};