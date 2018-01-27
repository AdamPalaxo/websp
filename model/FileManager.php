<?php


class FileManager
{

    /**
     * Adds new file into the database.
     *
     * @param string $fileName name of the file
     * @param int $fileSize size of the file
     * @param string $fileType type of the file
     * @param string $content content of the file
     */
    public function addFile($fileName, $fileSize, $fileType, $content)
    {

        $file = array(
            'id' => '',
            'filename' => $fileName,
            'filesize' => $fileSize,
            'filetype' => $fileType,
            'file' => $content
        );

        try
        {
            Db::insert('file', $file);
        }
        catch(PDOException $exception)
        {
            echo $exception->getMessage();
        }
    }

    /**
     * Updates file with given ID, which is stored in the database.
     *
     * @param int $id ID of updated file
     * @param string $fileName name of the file
     * @param int $fileSize size of the file
     * @param string $fileType type of the file
     * @param string $content content of the file
     */
    public function updateFile($id, $fileName, $fileSize, $fileType, $content)
    {

        $file = array(
            'id' => $id,
            'filename' => $fileName,
            'filesize' => $fileSize,
            'filetype' => $fileType,
            'file' => $content
        );

        try
        {
            Db::update('file', $file, 'WHERE id = ?', array($id));
        }
        catch(PDOException $exception)
        {
            echo $exception->getMessage();
        }
    }

}