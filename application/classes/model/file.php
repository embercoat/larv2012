<?php
class model_file extends Model {

    function dirsize($path){
        $dirsize = 0;
        $path = ($path[strlen($path)-1]!='/') ? $path.'/' : $path;
        foreach(scandir($path) as $file){
            $perms = $this->get_perms($path.$file);
            if(strpos($perms['o'], 'r') !== false && $file != '..' && $file != '.' && $file != '.git'){
                if(is_dir($path.$file)){
                    $dirsize += $this->dirsize($path.$file);
                } else {
                    $dirsize += filesize($path.$file);
                }
            }
        }
        return $dirsize;
    }
    public function get_files($path){
        $path = ($path[strlen($path)-1]!='/') ? $path.'/' : $path;
        $files = scandir($path);
        $return = array();
        foreach($files as $f){
            if(is_file($path.$f)){
                $return[] = $path.$f;
            }
        }
        return $return;
    }
    function get_perms($file){
        $perms = fileperms($file);
        $info['u'] = (($perms & 0x0100) ? 'r' : '-');
        $info['u'] .= (($perms & 0x0080) ? 'w' : '-');
        $info['u'] .= (($perms & 0x0040) ?
                (($perms & 0x0800) ? 's' : 'x' ) :
                (($perms & 0x0800) ? 'S' : '-'));

        // Group
        $info['g'] = (($perms & 0x0020) ? 'r' : '-');
        $info['g'] .= (($perms & 0x0010) ? 'w' : '-');
        $info['g'] .= (($perms & 0x0008) ?
                (($perms & 0x0400) ? 's' : 'x' ) :
                (($perms & 0x0400) ? 'S' : '-'));

        // World
        $info['o'] = (($perms & 0x0004) ? 'r' : '-');
        $info['o'] .= (($perms & 0x0002) ? 'w' : '-');
        $info['o'] .= (($perms & 0x0001) ?
                (($perms & 0x0200) ? 't' : 'x' ) :
                (($perms & 0x0200) ? 'T' : '-'));

        return $info;
    }
    function scan_to_db_filesystem($path, $filter_ext = false){
        $path = ($path[strlen($path)-1]!='/') ? $path.'/' : $path;
        $files = array();
        foreach(scandir($path) as $file){
            if($file[0] != '.'){
                if(is_dir($path.$file))
                    $files[$file] = scan_to_db_filesystem($path.$file, $filter_ext);
                else {
                    $bits = explode('.', $file);
                    $ext = array_pop($bits);

                    if($filter_ext !== false){
                        if(array_search($ext, $filter_ext) !== false){
                            $fileinfo = $id3->analyze($path.$file);
                            echo $path.$file.PHP_EOL;
                            if(!isset($fileinfo['tags_html']['id3v2']))
                                $tagver = 'id3v1';
                            else
                                $tagver = 'id3v2';

                            $sql = 'select * from meta where filename = "'.$path.$file.'"';
                            $r = $db->query($sql);
                            if($r->num_rows == 0){
                                $sql = 'select artistid from artist where artist = "'.$fileinfo['tags_html'][$tagver]['artist'][0].'"';
                                $r = $db->query($sql);
                                if($r->num_rows == 0){
                                    $sql = 'insert into artist set artist = "'.$fileinfo['tags_html'][$tagver]['artist'][0].'"';
                                    $db->query($sql);
                                    $artist_id = $db->insert_id;
                                } else {
                                    $artist_id = $r->fetch_assoc();
                                    $artist_id = $artist_id['artistid'];
                                }
                                if(!isset($fileinfo['tags_html'][$tagver]['album'])){
                                    $fileinfo['tags_html'][$tagver]['album'][0] = 'Unknown';
                                }
                                $sql = 'select albumid from album where album = "'.$fileinfo['tags_html'][$tagver]['album'][0].'"';
                                $r = $db->query($sql);
                                if($r->num_rows == 0){
                                    $sql = 'insert into album set album = "'.$fileinfo['tags_html'][$tagver]['album'][0].'"';
                                    $db->query($sql);
                                    $album_id = $db->insert_id;
                                } else {
                                    $album_id = $r->fetch_assoc();
                                    $album_id = $album_id['albumid'];
                                }
                                $sql = 'insert into meta (filename, artistid, albumid, title) VALUES ("'.$path.$file.'", '.$artist_id.', '.$album_id.', "'.$fileinfo['tags_html'][$tagver]['title'][0].'")';
                                $db->query($sql);
                            }
                            //~ $files[] = $file;
                        }
                    } else {
                        //~ $files[] = $file;
                    }
                }
            }
        }
        return $files;
    }
}