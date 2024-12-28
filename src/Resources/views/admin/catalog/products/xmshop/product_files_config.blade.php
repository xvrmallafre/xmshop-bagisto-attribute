<div class="control-group" v-if="product.product_files_active == 1">
    <label for="product_files_config">{{ __('admin::app.catalog.products.product_files_config') }}</label>
    <table class="table">
        <thead>
        <tr>
            <th>{{ __('admin::app.catalog.products.max_files') }}</th>
            <th>{{ __('admin::app.catalog.products.max_size') }}</th>
            <th>{{ __('admin::app.catalog.products.allowed_formats') }}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><input type="number" v-model="product_files_config.max_files" name="product_files_config[max_files]" class="control" /></td>
            <td><input type="number" v-model="product_files_config.max_size" name="product_files_config[max_size]" class="control" /></td>
            <td>
                <select v-model="product_files_config.allowed_formats" name="product_files_config[allowed_formats][]" class="control" multiple>
                    <!-- formatos de archivo de imagen y vectoriales -->
                    <option value="ai">AI</option>
                    <option value="eps">EPS</option>
                    <option value="svg">SVG</option>
                    <option value="jpg">JPG</option>
                    <option value="png">PNG</option>
                    <option value="pdf">PDF</option>
                    <option value="gif">GIF</option>
                    <option value="bmp">BMP</option>
                    <option value="tiff">TIFF</option>
                    <option value="psd">PSD</option>
                    <option value="webp">WEBP</option>
                    <!-- formatos de archivo de audio -->
                    <option value="mp3">MP3</option>
                    <option value="wav">WAV</option>
                    <option value="ogg">OGG</option>
                    <!-- formatos de archivo de video -->
                    <option value="mp4">MP4</option>
                    <option value="avi">AVI</option>
                    <option value="mov">MOV</option>
                    <option value="wmv">WMV</option>
                    <option value="flv">FLV</option>
                    <option value="webm">WEBM</option>
                    <!-- formatos de archivo de documentos -->
                    <option value="doc">DOC</option>
                    <option value="docx">DOCX</option>
                    <option value="xls">XLS</option>
                    <option value="xlsx">XLSX</option>
                    <option value="ppt">PPT</option>
                    <option value="pptx">PPTX</option>
                    <option value="txt">TXT</option>
                    <option value="rtf">RTF</option>
                    <option value="csv">CSV</option>
                    <option value="xml">XML</option>
                    <option value="json">JSON</option>
                    <option value="zip">ZIP</option>
                    <option value="rar">RAR</option>
                    <option value="7z">7Z</option>
                    <option value="tar">TAR</option>
                    <option value="gz">GZ</option>
                    <option value="bz2">BZ2</option>
                </select>
            </td>
        </tr>
        </tbody>
    </table>
</div>