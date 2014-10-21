<?php

class AjaxController extends Zend_Controller_Action {

    public function init() {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        $auth = Zend_Auth::getInstance();
        if (!$auth->hasIdentity()) {
            $this->redirect('/ajax/null');
        }
    }

    public function nullAction() {
        
    }

    public function actionAction() {
        $array = array();
        $array['type_action'] = $_POST['type_action'];
        $array['data-active'] = $_POST['data-active'];
        $array['event'] = $_POST['event'];
        $cheminPython = APPLICATION_PATH . '/../python/';
        $array['cheminPython'] = $cheminPython;
        switch ($_POST['type_action']) {
            case"startLive":
                if ($_POST['event'] == 'click') {
                    exec('python ' . $cheminPython . 'live.py "True"', $output, $return);
                    $array['output'] = $output;
                    $array['return'] = $return;
                }
                break;
            case "grab":
                if ($_POST['event'] == 'click') {
                    exec('python '.$cheminPython.'remoteControle.py "nao.local" "runbehavior" "grabObject"', $output, $return);
                    $array['output'] = $output;
                    $array['return'] = $return;
                }
                break;
            case "say":
                if ($_POST['event'] == 'click') {
                    $question = new Questionreponse();
                    $reponse = $question->find($_POST['id']);
                    exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "say" "' . $reponse[0]['reponse'] . ' "', $output, $return);
                }
                break;
            case "up":
                if ($_POST['event'] == 'press') {
                    exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "forward"', $output, $return);
                } else {
                    exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "stop"', $output, $return);
                }
                break;
            case "down":
                if ($_POST['event'] == 'press') {
                    exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "backward"', $output, $return);
                } else {
                    exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "stop"', $output, $return);
                }
                break;
            case "right":
                if ($_POST['event'] == 'press') {
                    exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "right"', $output, $return);
                } else {
                    exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "stop"', $output, $return);
                }
                $array['output'] = $output;
                $array['return'] = $return;
                break;
            case "left":
                if ($_POST['event'] == 'press') {
                    exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "left"', $output, $return);
                } else {
                    exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "stop"', $output, $return);
                }
                break;
            case "turn-right":
                if ($_POST['event'] == 'press') {
                    exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "rotateright"', $output, $return);
                } else {
                    exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "stop"', $output, $return);
                }
                break;
            case "turn-left":
                if ($_POST['event'] == 'press') {
                    exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "rotateleft"', $output, $return);
                } else {
                    exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "stop"', $output, $return);
                }
                break;
            case "sitdown":
                if ($_POST['event'] == 'click') {
                    exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "sit"', $output, $return);
                }
                break;
            case "crouch":
                if ($_POST['event'] == 'click') {
                    exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "crouch"', $output, $return);
                }
                break;
            case "standup":
                if ($_POST['event'] == 'click') {
                    exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "stand"', $output, $return);
                }
                break;
            case "lyingback":
                if ($_POST['event'] == 'click') {
                    exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "lyingback"', $output, $return);
                }
                break;
            case "lyingbelly":
                if ($_POST['event'] == 'click') {
                    exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "lyingbelly"', $output, $return);
                }
                break;
            case "stop":
                if ($_POST['event'] == 'click') {
                    exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "stop"', $output, $return);
                }
                break;
            case "sayhello":
                if ($_POST['event'] == 'click') {
                    exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "runbehavior" "direBonjour"', $output, $return);
                }
                break;
            case "scenario":
                if ($_POST['event'] == 'click') {
                    exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "scenario"', $output, $return);
                }
                break;
            case "dance":
                if ($_POST['event'] == 'click') {
                    exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "runbehavior" "dance"', $output, $return);
                }
                break;
            case "evolution":
               	if ($_POST['event'] == 'click') {
              		exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "runbehavior" "evolution"', $output, $return);
               	}
               	break;
            case "caravanpalace":
            	if ($_POST['event'] == 'click') {
            		exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "runbehavior" "caravanpalace"', $output, $return);
            	}
            	break;
            case "gangnamstyle":
            	if ($_POST['event'] == 'click') {
            		exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "runbehavior" "gangnamstyle"', $output, $return);
            	}
            	break;
            case "vangelis":
            	if ($_POST['event'] == 'click') {
                	exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "runbehavior" "vangelis"', $output, $return);
                }
                break;
            case "haka":
                if ($_POST['event'] == 'click') {
                    exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "runbehavior" "Haka"', $output, $return);
                }
                break;
            case "takePicture":
                if ($_POST['event'] == 'click') {
                    exec('python ' . $cheminPython . 'prendrePhoto.py', $output, $return);
                    $photo = new Photo();
                    $max = $photo->getIdMax();
                    $newphoto = $photo->createRow();
                    $newphoto->idPhoto = $max["MAX(idPhoto)"] + 1;
                    $newphoto->nomPhoto = $output[3] . '.jpeg';
                    $newphoto->save();
                }
                break;
            case "takeVideo":
                if ($_POST['event'] == 'click') {
                    //on fait la video
                    exec('python ' . $cheminPython . '/prendreVideo.py', $output, $return);
                    //on récupère son nom qui est en fait la date et l\'heure
                    $nomVideo = $output[4];
                    //on envoie toutes les sorties dans le JSON pour regarder ce qui se passe au cas ou
                    $array['output'] = $output;
                    $array['return'] = $return;
                    //on execute le cron
                    //exec('wget -o /home/matthieu/nao/cron/cron.convertVideo.log http://nao/cron/convertvideo?nomVideo='.$nomVideo);
                    //on sauvegarde le nom de la video en base
                    $video = new Video();
                    $max = $video->getIdMax();
                    $newvideo = $video->createRow();
                    $newvideo->idVideo = $max["MAX(idVideo)"] + 1;
                    $newvideo->nomVideo = $nomVideo;
                    $newvideo->save();
                }
                break;
            case "setVolume":
                if ($_POST['event'] == 'click') {
                    $sound = new Sound();
                    $sound->updateSound($_POST['value']);
                    $array['value'] = $_POST['value'];
                    exec('python ' . APPLICATION_PATH . '/../python/volume.py "nao.local" "set" "' . $_POST['value'] . '"', $output, $return);
                }
                break;

            case "live":
                if ($_POST['event'] == 'click') {
                    exec('python '.APPLICATION_PATH.'/../python/live.py True > /dev/null&', $output, $return);
                }
                break;
            case "passion":
            	if ($_POST['event'] == 'click') {
            		exec('python ' . $cheminPython . 'remoteControle.py "nao.local" "runbehavior" "passion"', $output, $return);
            	}
            	break;
        }
        echo json_encode($array);
    }

    public function photoAction() {
        $photo = new Photo();
        $array = array();
        $array['last'] = $_POST['last'];
        $array['requete'] = $photo->getQuatre($_POST['last']);
        echo json_encode($array);
    }

}
