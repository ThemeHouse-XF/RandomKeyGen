<?php

/**
 *
 * @see XenForo_ControllerPublic_Misc
 */
class ThemeHouse_RandomKeyGen_Extend_XenForo_ControllerPublic_Misc extends XFCP_ThemeHouse_RandomKeyGen_Extend_XenForo_ControllerPublic_Misc
{

    /**
     * Returns a new CAPTCHA
     *
     * @return XenForo_ControllerResponse_View
     */
    public function actionKeyGen()
    {
        $userId = XenForo_Visitor::getUserId();
        
        if ($this->_request->isPost()) {
            if (!$userId) {
                return $this->responseRedirect(XenForo_ControllerResponse_Redirect::SUCCESS, 
                    $this->getDynamicRedirect(), 
                    new XenForo_Phrase('th_only_members_can_access_this_action_randomkeygen'));
            }
            
            self::_genKey($userId);
            
            return $this->responseRedirect(XenForo_ControllerResponse_Redirect::SUCCESS, $this->getDynamicRedirect(), 
                new XenForo_Phrase('th_your_key_has_been_generated_randomkeygen'));
        } else {
            $viewParams['redirect'] = $this->getDynamicRedirect();
            
            return $this->responseView('XenForo_ViewPublic_Misc_KeyGen', 'th_key_gen_randomkeygen', $viewParams);
        }
    } /* END actionKeyGen */

    protected function _genKey($userId)
    {
        $randomKey = XenForo_Application::generateRandomString(10);
        
        $db = XenForo_Application::getDb();
        
        $db->query(
            'UPDATE xf_user
            SET gen_key = ' . $db->quote($randomKey) . '
            WHERE user_id = ' . $userId . '');
    } /* END _genKey */
}