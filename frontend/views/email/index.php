<link rel="stylesheet" href="/css/task-form.css"/>
<script type="text/javascript" src="/js/lib/jquery-3.1.1.js"></script>
<script type="text/javascript" src="/js/lib/jquery-file-upload/jquery.ui.widget.js"></script>
<script type="text/javascript" src="/js/lib/jquery-file-upload/jquery.fileupload.js"></script>
<script type="text/javascript" src="/js/create_task.js"></script>
<div class="task-form">
	<div>
		<label>任务名称:</label>
		<input type="text"/>
	</div>
	
	<div class="module">
		<table>
			<tr>
				<th colspan="4">发件服务器配置</th>
			</tr>
			<tr>
				<td>SMTP 服务器</td>
				<td><input type="text" /></td>
				<td>端口</td>
				<td><input type="text" /></td>
			</tr>
			<tr>
				<td>发件邮箱</td>
				<td><input type="text" /></td>
				<td>密码</td>
				<td><input type="password" /></td>
			</tr>
		</table>
	</div>
	
	<div class="module">
		<table>
			<tr>
				<th colspan="2">邮件模板配置</th>
			</tr>
			<tr>
				<td style="width:250px;">主题</td>
				<td><input type="text" style="width:100%;text-align:left;"/></td>
			</tr>
			<tr>
				<td>正文</td>
				<td>
					<div style="height: 339px; line-height: 339px;">
						<input type="hidden" name="123" class="ewebeditor_hide_ipt" value="" />
        				<iframe class="editor_iframe" ID="iframe_editor_123" src="http://incms.integle.com/editor/ewebeditor.htm?id=123&style=coolblue" frameborder="0" scrolling="no" width="100%" height="300"></iframe>
					</div>
				</td>
			</tr>
			<tr>
				<td>附件</td>
				<td style="text-align:left;">
					<input type="checkbox"/>
					<input type="text" style="display:none;text-align:left;width:80%;" placeholder="请输入附件名对应在Excel文件中的列"/>
				</td>
			</tr>
			<tr>
				<td>Excel文件上传</td>
				<td style="text-align:left;">
					<div class="file-upload-container">
    					<span class="file-upload-button">
                            <span>+选择文件</span>
                            <input id="excel-upload" type="file" name="file"/>
                        </span>
                        <div id="excel-upload-progress" class="progress">
                        	<span>上传进度：</span>
                            <div class="progress-bar">
                                <div class="progress-bar-success"></div>
                            </div>
                            <span class="progress-percentage"></span>
                        </div>
                    </div>
				</td>
			</tr>
			<tr id="attachment-tr">
				<td>附件上传</td>
				<td style="text-align:left;">
					<div class="file-upload-container">
    					<span class="file-upload-button btn-disabled">
                            <span>+选择文件</span>
                            <input id="attachment-upload" type="file" name="attachments[]" multiple/>
                        </span>
                        <div id="attachment-upload-progress" class="progress">
                        	<span>上传进度：</span>
                            <div class="progress-bar">
                                <div class="progress-bar-success"></div>
                            </div>
                            <span class="progress-percentage"></span>
                        </div>
                    </div>
				</td>
			</tr>
		</table>
	</div>
	<div class="form-footer">
		<span class="file-upload-button">
            <span>新建任务</span>
        </span>
	</div>
	
<!-- 	<fieldset> -->
<!-- 		<legend> -->
<!-- 			发件服务器配置 -->
<!-- 		</legend> -->
<!-- 		<div class="form-group"> -->
<!-- 			<label>STMP:</label> -->
<!-- 			<input type="text" id="smtp"/> -->
<!-- 		</div> -->
<!-- 		<div class="form-group"> -->
<!-- 			<label>端口:</label> -->
<!-- 			<input type="text" id="port"/> -->
<!-- 		</div> -->
<!-- 		<div class="form-group"> -->
<!-- 			<label>发件邮箱:</label> -->
<!-- 			<input type="email" id="port"/> -->
<!-- 		</div> -->
<!-- 		<div class="form-group"> -->
<!-- 			<label>密码:</label> -->
<!-- 			<input type="password" id="port"/> -->
<!-- 		</div> -->
<!-- 	</fieldset> -->
	
<!-- 	<fieldset> -->
<!-- 		<legend> -->
<!-- 			邮件模板配置 -->
<!-- 		</legend> -->
<!-- 		<div class="form-group"> -->
<!-- 			<label>主题:</label> -->
<!-- 			<input type="text" id="email-subject"/> -->
<!-- 		</div> -->
<!-- 		<div class="form-group"> -->
<!-- 			<label>正文:</label> -->
<!-- 			<input type="text" id="email-body"/> -->
<!-- 		</div> -->
<!-- 		<div class="form-group"> -->
<!-- 			<label>是否发送附件:</label> -->
<!-- 			<input type="checkbox" id="email-attachment"/> -->
<!-- 		</div> -->
<!-- 	</fieldset> -->
</div>